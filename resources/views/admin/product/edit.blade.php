@extends('admin.layout.master')
@section('title', 'Update Product')
@section('content_title', 'Update Product')
@section('content')
    <div class="rounded max-w-lg mx-auto mt-5">
        <form action="{{route('admin.products.update', $product->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
            <input type="hidden" name="id" value="{{$product->id}}">
                <label for="products_name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="products_name"
                    value="{{$product->products_name}}"

                />

                @error('products_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="products_image" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="products_image"
                    
                />

                @error('products_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="categories_id" class="inline-block text-lg mb-2">
                    Category
                </label>
                <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

                @error('categories_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit"  class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <!-- <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /> -->
                    </svg>
                    </span>
                    Update a new Product
                </button>
            </div>

        </form>
    </div>
@endsection