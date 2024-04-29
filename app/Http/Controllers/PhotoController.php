<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PhotoController extends Controller
{
    public function index(){
        $photographer = Photographer::all();
        return view('admin.photographer.list', compact('photographer'));
    }
    public function create(){
        return view('admin.photographer.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'image'=> 'required|file|mimes:jpg,jpeg,png',
            'description'=> 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move("uploads/photographer/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/photographer/" . $file->getClientOriginalName();

        $photographer = Photographer::create($formFields);
        return redirect()->route('admin.photographer.list');
    }

    //sửa - xóa
    public function edit($id) {
        $photographer = Photographer::find($id);
        return view('admin.photographer.edit', ['photographer'=> $photographer]);
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
        $photographer = Photographer::find($formFields['id']);


        if($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/photographer/';
            $file->move($path, $filename);
            $photographer->image = $path . $filename;
        }
        
        // dd($request->image);
        $photographer->name = $formFields['name'];
        $photographer->phone_number = $formFields['phone_number'];
        $photographer->address = $formFields['address'];
        $photographer->description = $formFields['description'];
        $photographer->created_at = Carbon::now();


        $photographer->save();
        return redirect()->route('admin.photographer.list');
    }


    public function delete($id) {
        Photographer::where('id', $id)->delete();
        return redirect('admin/photographer/list')->with('message', 'Delete photographer successfully');
    }
}
