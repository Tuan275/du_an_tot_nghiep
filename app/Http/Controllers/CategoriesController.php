<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact("categories"));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $categories = Category::all();
        $formFields = $request->validate([
            'name'=> 'required',
        ]);
        $category = Category::create($formFields);
        return redirect()->route('admin.categories.list');
    }

    //sửa - xóa

    public function edit($id) {
        $categories = Category::find($id);
        return view('admin.categories.edit', ['categories'=> $categories]);
    }

    public function update(Request $request) {
        $formFields = $request->validate([
            'name'=> 'required',
            'id'=>'required',

        ]);

        // dd($formFields);
        $categories = Category::find($formFields['id']);
        
        // dd($request->image);
        $categories->name = $formFields['name'];
        $categories->created_at = Carbon::now();


        $categories->save();
        return redirect()->route('admin.categories.list');
    }

    public function delete($id) {
        Category::where('id', $id)->delete();
        return redirect('admin/categories/list')->with('message', 'Delete categories successfully');
    }

    

}
