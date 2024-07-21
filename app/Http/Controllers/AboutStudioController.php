<?php

namespace App\Http\Controllers;
use App\Models\AboutStudio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutStudioController extends Controller
{
    public function index()
    {
        $about = AboutStudio::paginate(3);
        return view('admin.about.list', compact('about'))->with('i', (request()->input('page',1) -1) *5);
    }
    public function create()
    {   
        
        // dd($categories);
        return view('admin.about.create',);
       
    }
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'title' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'description'=> 'required',

        ]);
        //dd($formFields);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move("uploads/about/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/about/" . $file->getClientOriginalName();
         AboutStudio::create($formFields);
        
         
        return redirect()->route('admin.about.list');
    }

    public function edit($id)
    {   
        $about = AboutStudio::find($id);
        return view('admin.about.edit', ['about' => $about]);
        
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'description'=> 'required',
            'id' => 'required',

        ]);

        // dd($formFields);
        $about = AboutStudio::find($formFields['id']);


        if ($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/about/';
            $file->move($path, $filename);
            $about->products_image = $path . $filename;
        }

        // dd($request->image);
        $about->title = $formFields['title'];
        $about->description = $formFields['description'];

        
        $about->created_at = Carbon::now();


        $about->save();
        return redirect()->route('admin.about.list');
    }

    public function update_status(Request $request)
    {
        $about = AboutStudio::find($request->id);
        if ($about) {
            $about->status = $request->status;
        }
        $about->save();
        return redirect()->route('admin.about.list');
    }

    public function delete($id)
    {
        AboutStudio::where('id', $id)->delete();
        return redirect('admin/about/list')->with('message', 'Delete about successfully');
    }


    
}
