@extends('admin.layout.master')
@section('title', 'List Review')
@section('content_title', 'List Review')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Service</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($review as $key => $Review)
        <tr>
            <th scope="row">{{$key+=1}}</th>
            <td>{{$Review->users->name}}</td>
            <td>{{$Review->services->name_service}}</td>
            <td>{{$Review->description}}</td>
            <td>
                @if ($Review->status == 0)
                <button class="btn btn-info w-20">
                    <a class="text-white" href="{{ route('admin.review.update_status', ['id' => $Review->id, 'status' => 1]) }}" onclick="return confirm('Bạn có muốn ẩn đánh giá?')">Hidden</a>
                </button>
                @else
                <button class="btn btn-success w-20">
                    <a class="text-white" href="{{ route('admin.review.update_status', ['id' => $Review->id, 'status' => 0]) }}" onclick="return confirm('Bạn có muốn hiện đánh giá?')">Show</a>
                </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection