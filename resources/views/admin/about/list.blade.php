@extends('admin.layout.master')
@section('title', 'List About')
@section('content_title', 'List About')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($about as $key => $About)
        <tr>
            <th scope="row">{{$key+=1}}</th>
            <td>{{$About->title}}</td>
            <td><img class="w-[60px] h-[100px]" src="../../../{{$About->image}}" alt=""></td>
            <td>{!!$About->description!!}</td>
            <td>
                @if ($About-> status == 0)
                <button class="btn btn-success w-20">
                    <a class="text-white" href="{{ route('admin.about.update_status', ['id'=> $About->id, 'status' => 1]) }}" onclick="return confirm('Do you want to make it public ?')">
                        Show
                    </a>
                </button>
                @endif
                @if ($About->status == 1)
                <button class="btn btn-info w-20">
                    <a class="text-white" href="{{ route('admin.about.update_status', ['id'=> $About->id, 'status' => 0]) }}" onclick="return confirm('Do you want to make it private ?')">
                        Hidden
                    </a>
                </button>
                @endif
            </td>
            <td>
                <div class="grid gap-2 items-center">
                    <button class="btn btn-primary">
                        <a class="text-white" href="{{route('admin.about.edit', $About->id)}}">Edit</a>
                    </button>
                    <button class="btn btn-danger">
                        <a class="text-white" onclick="return confirm('Really delete this product?')" href="{{route('admin.about.delete', $About->id)}}"> Delete</a>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{$about ->links()}}
@endsection