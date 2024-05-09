@extends('admin.layout.master')
@section('title', 'Create Product')
@section('content_title', 'Create Product')
@section('content')
<div class="rounded max-w-lg mx-auto mt-5">
    <form method="POST" action="{{route('admin.products.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="products_name" class="inline-block text-lg mb-2">
                Name
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="products_name" value="{{old('products_name')}}" />

            @error('products_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="products_image" class="inline-block text-lg mb-2">
                Image
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="products_image" multiple="multiple" />

            @error('products_image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="category_id" class="inline-block text-lg mb-2">
                Category
            </label>
            <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            @error('category_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                
                Create a new product
            </button>
        </div>

    </form>
</div>
@endsection