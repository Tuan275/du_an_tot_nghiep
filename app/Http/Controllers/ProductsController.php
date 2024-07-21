<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Products::paginate(3);
        return view('admin.product.list', compact('product'))->with('i', (request()->input('page',1) -1) *5);
    }
    public function create()
    {   
        $categories = Category::all();
        // dd($categories);
        return view('admin.product.create', [
            'categories' => $categories,
        ]);
       
    }
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'products_name' => 'required',
            'products_image' => 'required|file|mimes:jpg,jpeg,png',
            'category_id'=> 'required',

        ]);
        //dd($formFields);
        if ($request->hasFile('products_image')) {
            $file = $request->products_image;
            $file->move("uploads/products/", $file->getClientOriginalName());
        }
        $formFields['products_image'] = "uploads/products/" . $file->getClientOriginalName();
         Products::create($formFields);
         $category = Category::find($request->category_id);
         
        return redirect()->route('admin.products.list');
    }

    public function edit($id)
    {   
        $categories = Category::all();
        $product = Products::find($id);
        return view('admin.product.edit', ['product' => $product,'categories' => $categories]);
        
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'products_name' => 'required',
            'products_image' => 'required|file|mimes:jpg,jpeg,png',
            'category_id'=> 'required',
            'id' => 'required',

        ]);

        // dd($formFields);
        $product = Products::find($formFields['id']);


        if ($request->hasFile('products_image')) {
            $file = $formFields['products_image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/product/';
            $file->move($path, $filename);
            $product->products_image = $path . $filename;
        }

        // dd($request->image);
        $product->products_name = $formFields['products_name'];
        $product->category_id = $formFields['category_id'];

        
        $product->created_at = Carbon::now();


        $product->save();
        return redirect()->route('admin.products.list');
    }

    public function delete($id)
    {
        Products::where('id', $id)->delete();
        return redirect('admin/product/list')->with('message', 'Delete product successfully');
    }


    

}
