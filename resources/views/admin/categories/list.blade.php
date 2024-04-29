@extends('admin.layout.master')
@section('title', 'List Categories')
@section('content_title', 'List Categories')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $Categories)
                <tr>
                    <th scope="row">{{$key+=1}}</th>
                    <td>{{$Categories->name}}</td>
                    <td><button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.categories.edit', $Categories->id)}}">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a class="text-white"
                            onclick="return confirm('Really delete this categories?')"
                            href="{{route('admin.categories.delete', $Categories->id)}}"> Delete</a>
                        </button>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection