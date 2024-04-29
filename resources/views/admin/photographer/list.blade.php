@extends('admin.layout.master')
@section('title', 'List Photographer')
@section('content_title', 'List Photographer')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($photographer as $key => $Photographer)
        <tr>
            <th scope="row">{{$key+=1}}</th>
            <td>{{$Photographer->name}}</td>
            <td>{{$Photographer->address}}</td>
            <td>{{$Photographer->phone_number}}</td>
            <td><img class="w-[64px] h-[64px]" src="../../../{{$Photographer->image}}" alt=""></td>
            <td>{{$Photographer->description}}</td>
            <td><button class="btn btn-primary">
                    <a class="text-white" href="{{route('admin.photographer.edit', $Photographer->id)}}">Edit</a>
                </button>
                <button class="btn btn-danger">
                    <a class="text-white" onclick="return confirm('Really delete this photographer?')" href="{{route('admin.photographer.delete', $Photographer->id)}}"> Delete</a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection