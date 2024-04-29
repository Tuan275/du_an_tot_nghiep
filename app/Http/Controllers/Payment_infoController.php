<?php

namespace App\Http\Controllers;

use App\Models\Payment_info;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function Laravel\Prompts\table;

class Payment_infoController extends Controller
{   
    public function index(){
        $payment = Payment_info::all();
        return view('admin.payment.list', compact('payment'));
    }
  


    //sửa - xóa
    public function edit($id) {
        $payment = Payment_info::find($id);
        return view('admin.payment.edit', ['payment'=> $payment]);
    }

    public function update(Request $request) {
        $formFields = $request->validate([
            'name'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'image'=> 'required|file|mimes:jpg,jpeg,png',
            'description'=> 'required',
            'id'=>'required',

        ]);

        // dd($formFields);
        $payment = Payment_info::find($formFields['id']);


        if($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/payment/';
            $file->move($path, $filename);
            $payment->image = $path . $filename;
        }
        
        // dd($request->image);
        $payment->name = $formFields['name'];
        $payment->phone_number = $formFields['phone_number'];
        $payment->address = $formFields['address'];
        $payment->description = $formFields['description'];
        $payment->created_at = Carbon::now();


        $payment->save();
        return redirect()->route('admin.payment.list');
    }


    public function delete($id) {
        Payment_info::where('id', $id)->delete();
        return redirect('admin/payment/list')->with('message', 'Delete payment successfully');
    }

}
