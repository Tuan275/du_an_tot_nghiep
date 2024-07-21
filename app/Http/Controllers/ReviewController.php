<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Reviews;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {   
        $review = Reviews::all();
        return view('admin.reviewService.list', compact('review'));
    }
    public function create(){
        $service = Services::all();
        $appointment= Appointments::all();
        return view('client.userDetail', [
            'service' => $service], ['appointment'=>$appointment]);
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'description'=>'required'
            
        ]);
        Reviews::create($formFields);
        $services = Services::find($request->service_id);
        return redirect()->route('client.userDetail')->with('message','Cảm ơn bạn đã đánh giá dịch vụ');
    }

    public function update_status(Request $request)
    {
        $review = Reviews::find($request->id);
        if ($review) {
            $review->status = $request->status;
        }
        $review->save();
        return redirect()->route('admin.review.list');
    }

}
