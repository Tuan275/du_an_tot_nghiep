@extends('client.layout.master')
@section('content')
<style>
    .zoomed-image {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        cursor: pointer;
    }
</style>

@php
$displayedCategories = [];
@endphp

<div class="text-center max-w-lg mx-auto p-4 rounded">
    <p class="font-bold text-xl">THƯ VIỆN ẢNH</p>
    <p>Thư viện ảnh khổng lồ với hơn 1000 bộ ảnh thỏa sức cho bạn lựa chọn phong cách phù hợp</p>
</div>

@foreach ($product as $items)
@if (!in_array($items->categories->name, $displayedCategories))
@php
$displayedCategories[] = $items->categories->name;
$products = $product->where('categories.name', $items->categories->name);
$totalProducts = $products->count();
$perPage = 3;
$totalPages = ceil($totalProducts / $perPage);
$currentPage = request()->get('page', 1);
$offset = ($currentPage - 1) * $perPage;
$products = $products->slice($offset, $perPage);
@endphp

<div class="bg-gray-300 p-5 mb-5 rounded-md shadow-lg">
    <div class="bg-[#555] text-white p-3 text-lg font-semibold rounded-md mb-4">
        <p>{{$items->categories->name}}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $item)
        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:scale-105 category-right-content-item">
            <img src="../../../{{ $item->products_image }}" alt="{{ $item->products_name }}" class="w-3/4 h-auto mx-auto mb-4">
            <p class="font-bold"><a href="#">{{ $item->products_name }}</a></p>
        </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        @for ($i = 1; $i <= $totalPages; $i++)
        <a href="?page={{ $i }}" class="px-4 py-2 mx-1 rounded-md {{ $i == $currentPage ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-700' }}">{{ $i }}</a>
        @endfor
    </div>
</div>

@endif
@endforeach

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var images = document.querySelectorAll('.category-right-content-item img');
        var zoomedImageContainer = null;
        var isZoomed = false;

        images.forEach(function(image) {
            image.addEventListener('click', function() {
                if (isZoomed && zoomedImageContainer.contains(event.target)) {
                    return;
                }

                if (isZoomed) {
                    zoomedImageContainer.remove();
                    isZoomed = false;
                } else {
                    var largerImageSrc = this.src;
                    var largerImage = document.createElement('img');
                    largerImage.src = largerImageSrc;
                    largerImage.classList.add('zoomed-image');

                    zoomedImageContainer = document.createElement('div');
                    zoomedImageContainer.classList.add('zoomed-image-container');
                    zoomedImageContainer.appendChild(largerImage);

                    zoomedImageContainer.addEventListener('click', function() {
                        zoomedImageContainer.remove();
                        isZoomed = false;
                    });

                    document.body.appendChild(zoomedImageContainer);
                    isZoomed = true;
                }
            });
        });
    });
</script>
@endsection
