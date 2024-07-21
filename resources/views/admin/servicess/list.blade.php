@extends('admin.layout.master')
@section('title', 'List Service')
@section('content_title', 'List Service')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price Table</th>
            <th scope="col">Status</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ser as $key => $Services)
        <tr>
            <th scope="row">{{$key+=1}}</th>
            <td>{{$Services->name_service}}</td>
            <td><img class="w-[40%] h-[60%]" src="../../../{{$Services->image}}" alt=""></td>
            <td>{{$Services->description}}</td>
            <td>{!! $Services->price_table !!}</td>
            <td>
                @if ($Services-> status == 0)
                <button class="btn btn-success w-20">
                    <a class="text-white" href="{{ route('admin.service.update_status', ['id'=> $Services->id, 'status' => 1]) }}" onclick="return confirm('Do you want to make it public ?')">
                        Show
                    </a>
                </button>
                @endif
                @if ($Services->status == 1)
                <button class="btn btn-info w-20">
                    <a class="text-white" href="{{ route('admin.service.update_status', ['id'=> $Services->id, 'status' => 0]) }}" onclick="return confirm('Do you want to make it private ?')">
                        Hidden
                    </a>
                </button>
                @endif
            </td>
            <td>{{$Services->price}}</td>
            <td>
                <div class="grid gap-2 items-center">
                    <button class="btn btn-primary">
                        <a class="text-white" href="{{route('admin.service.edit', $Services->id)}}">Edit</a>
                    </button>
                    <button class="btn btn-danger">
                        <a class="text-white" onclick="return confirm('Really delete this service?')" href="{{route('admin.service.delete', $Services->id)}}"> Delete</a>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$ser ->links()}}
@endsection