<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServicesController extends Controller
{
    public function index()
    {
        $ser = Services::all();
        return view('admin.servicess.list', compact('ser'));
    }
    public function create()
    {
        return view('admin.servicess.create');
    }
    public function store(Request $request)
    {
        $ser = Services::all();
        $formFields = $request->validate([
            'name_service' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'status' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move("uploads/servicess/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/servicess/" . $file->getClientOriginalName();
        $ser = Services::create($formFields);
        return redirect()->route('admin.service.list');
    }

    public function edit($id)
    {
        $ser = Services::find($id);
        return view('admin.servicess.edit', ['ser' => $ser]);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name_service' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'status' => 'required',
            'description' => 'required',
            'id' => 'required',

        ]);

        // dd($formFields);
        $ser = Services::find($formFields['id']);


        if ($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/servicess/';
            $file->move($path, $filename);
            $ser->image = $path . $filename;
        }

        // dd($request->image);
        $ser->name_service = $formFields['name_service'];
        $ser->description = $formFields['description'];
        $ser->status =  $formFields['status'];
        $ser->created_at = Carbon::now();


        $ser->save();
        return redirect()->route('admin.service.list');
    }

    public function update_status(Request $request)
    {
        $ser = Services::find($request->id);
        if ($ser) {
            $ser->status = $request->status;
        }
        $ser->save();
        return redirect()->route('admin.service.list');
    }

    public function delete($id)
    {
        Services::where('id', $id)->delete();
        return redirect('admin/service/list')->with('message', 'Delete service successfully');
    }

    public function show_services()
    {
        $ser = Services::all();
        return view('client.home', compact('ser'));
    }
}
