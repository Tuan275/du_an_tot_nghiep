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
            <td>
                @if ($user->role == 0)
                <button class="btn btn-info w-20">
                    <a class="text-white" href="{{ route('admin.user.update_role', ['id' => $user->id, 'role' => 1]) }}" onclick="return confirm('Bạn có muốn chuyển tài khoản này sang tài khoản quản trị không?')">User</a>
                </button>
                @else
                <button class="btn btn-success w-20">
                    <a class="text-white" href="{{ route('admin.user.update_role', ['id' => $user->id, 'role' => 0]) }}" onclick="return confirm('Bạn có muốn chuyển tài khoản này sang tài khoản người dùng không?')">Admin</a>
                </button>
                @endif
            </td>
            <td>
                <img class="w-[64px] h-[64px]" src="../../../{{$user->image}}" alt="">
            </td>
            <td><button class="btn btn-primary">
                    <a class="text-white" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
                </button>
                <button class="btn btn-danger">
                    <a class="text-white" onclick="return confirm('Really delete this user?')" href="{{route('admin.user.delete', $user->id)}}"> Delete</a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{$users->links()}}
@endsection