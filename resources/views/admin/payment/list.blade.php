@extends('admin.layout.master')
@section('title', 'List Payment')
@section('content_title', 'List Payment')
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
            @foreach ($payment as $key => $Payment)
                <tr>
                    <th scope="row">{{$key+=1}}</th>
                    <td>{{$Payment->name}}</td>
                    <td>{{$Payment->address}}</td>
                    <td>{{$Payment->phone_number}}</td>
                    <td><img width="100" src="../../../{{$Payment->image}}" alt=""></td>
                    <td>{{$Payment->description}}</td>
                    <td><button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.payment.edit', $Payment->id)}}">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a class="text-white"
                            onclick="return confirm('Really delete this payment?')"
                            href="{{route('admin.payment.delete', $Payment->id)}}"> Delete</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection