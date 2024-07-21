@extends('admin.layout.master')
@section('title', 'List Product')
@section('content_title', 'List Product')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $key => $Products)
        <tr>
            <th scope="row">{{$key+=1}}</th>
            <td>{{$Products->products_name}}</td>
            <td><img class="w-[60px] h-[100px]" src="../../../{{$Products->products_image}}" alt=""></td>
            <td>{{$Products->categories->name}}</td>
            <td>
                <div class="grid gap-2 items-center">
                    <button class="btn btn-primary">
                        <a class="text-white" href="{{route('admin.products.edit', $Products->id)}}">Edit</a>
                    </button>
                    <button class="btn btn-danger">
                        <a class="text-white" onclick="return confirm('Really delete this product?')" href="{{route('admin.products.delete', $Products->id)}}"> Delete</a>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{$product ->links()}}
@endsection