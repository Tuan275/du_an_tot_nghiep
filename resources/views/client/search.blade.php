@extends('client.layout.master')
@section('content')
<div class="container mx-auto mt-5">
    <h2 class="text-xl font-bold mb-6">Kết quả tìm kiếm cho: "{{ request()->input('keyword') }}"</h2>
    @if($services->isEmpty())
        <p class="text-gray-500">Không tìm thấy dịch vụ nào.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 p-10 bg-gray-100">
    @foreach($services as $service)
    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-indigo-600">{{ $service->name_service }}</h3>
        <p class="text-gray-800 text-lg mb-6">{{ number_format($service->price, 0, ',', '.') }} VNĐ</p>
        <img class="w-full h-auto rounded-lg mb-4" src="../../../{{ $service->image }}" alt="{{ $service->name_service }}">
        <div class="prose max-w-none">
            {!! $service->price_table !!}
        </div>
    </div>
    @endforeach
</div>

    @endif
</div>
@endsection
