@extends('client.layout.master')
@section('content')
<div class="grid">
  @foreach ( $ser as $items)
  <div class="py-5 bg-[#333]">
    <div class="container flex gap-5 items-center">
      <img width="100" class="w-[500px] h-[300px]" src="../../../{{$items->image}}" alt="">
      <div class="grid gap-2 text-white">
        <p class="text-2xl font-bold">{{$items->name_service}}</p>
        <p class="text-base">{{$items->description}}</p>
        <div class="flex gap-3">
          <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70">
            Thư viện ảnh
          </button>
          <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70">
            Đặt lịch ngay
          </button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection