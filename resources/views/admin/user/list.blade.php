@extends('admin.layout.master')
@section('title', 'List User')
@section('content_title', 'List User')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{$key+=1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role == 1 ? "Admin" : "User"}}</td>
                    <td>
                        <img width="100" src="../../../{{$user->image}}" alt="">
                    </td>
                    <td><button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a class="text-white"
                            onclick="return confirm('Really delete this user?')"
                            href="{{route('admin.user.delete', $user->id)}}"> Delete</a>
                        </button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection