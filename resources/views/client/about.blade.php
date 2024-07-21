@extends('client.layout.master')

@section('content')
<style>
    .zoomed-image-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        cursor: pointer;
    }

    .zoomed-image {
        max-width: 80%;
        max-height: 80%;
        object-fit: contain;
    }
</style>

<div class="grid">
    @foreach ($about as $items)
    <div class="py-5 bg-[#333] border-b border-white">
        <div class="text-center flex max-w-lg mx-auto p-4 rounded text-white">
            <p class="font-bold text-xl uppercase">{{$items->title}}</p>
        </div>
        <div class="container flex gap-5 items-center">
            <div class="w-[50%] image-about">
                <img class="w-full h-auto rounded" src="../../../{{ $items->image }}" alt="">
            </div>
            <div class="grid gap-2 text-white w-[50%]">
                <p class="text-base">{!! $items->description !!}</p>
                <div class="flex gap-3">
                    <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70" onclick="navigateTo('{{ route('client.album')}}')">
                        Thư viện ảnh
                    </button>
                    <button class="py-2 px-3 border border-[#ccc] bg-gray hover:opacity-70" onclick="navigateTo('{{ route('client.contact')}}')">
                        Đặt lịch ngay
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    function navigateTo(url) {
        window.location.href = url;
    }

    document.addEventListener("DOMContentLoaded", function() {
        var images = document.querySelectorAll('.image-about img');
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
