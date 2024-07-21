@extends('client.layout.master')
@section('content')

<div class="clearfix">
    <section id="slider">
        <div class="aspect-ratio-169">
            <img src="../uploads/imag/nangtho.jpg" style="width: 100%; height: 90%">
            <img src="../uploads/imag/na.jpg" style="width: 100%; height: 90%">
            <img src="../uploads/imag/giadinh.jpg" style="width: 100%; height: 90%">
            <img src="https://congstudio.vn/wp-content/uploads/2022/04/Bang-gia-chup-anh-ky-yeu-cap-3-gia-re-29.jpg" style="width: 100%;height: 90%">
            <img src="../uploads/imag/damcuoi.jpg" style="width: 100%; height: 90%">
        </div>
        <div class="slider-content">
            <h2>HẢI KẸO STUDIO</h2>
            <p>Hình ảnh cá nhân đại diện cho chính bản thân bạn, thể hiện tính cách, hình tượng và định hướng bạn đang theo đuổi.</p>
            <button class="py-2 px-3 border border-[#ccc] bg-[#555] text-white font-bold hover:bg-[#770000] hover:text-white" onclick="navigateTo('{{ route('client.contact') }}')">
                ĐẶT LỊCH NGAY
            </button>
        </div>
        <div class="dot-container ">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
    <script>
        const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
        const imgContainer = document.querySelector(".aspect-ratio-169")
        const dotItem = document.querySelectorAll(".dot")
        let index = 0
        let imgNumber = imgPosition.length
        imgPosition.forEach(function(image, index) {
            image.style.left = index * 100 + "%"
            dotItem[index].addEventListener("click", function() {
                slider(index)
            })
        })

        function imgSlide() {
            index++;
            if (index >= imgNumber) {
                index = 0;
            }
            slider(index);
        }

        function slider(index) {
            imgContainer.style.left = "-" + index * 100 + "%";
            const dotActive = document.querySelector(".active")
            dotActive.classList.remove("active")
            dotItem[index].classList.add("active")
        }
        setInterval(imgSlide, 5000)
    </script>
</div>
<div class="text-center max-w-lg mx-auto p-4 rounded">
    <p class="font-bold text-xl">HẢI KẸO STUDIO</p>
    <p> Sự lựa chọn tuyệt vời - Mang lại trải nghiệm tuyệt vời</p>
</div>
<!-- Phần show Service -->
<div class="grid">
    @foreach ($ser as $items)
    <div class="py-5 bg-[#333] border-b border-white">
        <div class="container flex gap-5 items-center">
            <div class="w-[50%]">
                <img width="100" class="w-full h-[full] rounded" src="../../../{{ $items->image }}" alt="">
            </div>
            <div class="grid gap-2 text-white w-[50%]">
                <p class="text-2xl font-bold">{{ $items->name_service }}</p>
                <p class="text-base">{{ $items->description }}</p>
                <p class="text-2xl font-bold text-yellow ">{{ number_format($items->price, 0, ',', '.') }} VNĐ</p>
                <!-- <a class="py-2 px-3 bg-gray hover:opacity-70 flex items-center">
                    Chi tiết bảng giá
                </a> -->
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
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
    @endforeach
</div>

<!-- Phần show Product -->

@php
// Get the total count of all products
$totalProducts = $product->count();
// Define how many products to display per page
$perPage = 3;
// Calculate the total number of pages
$totalPages = ceil($totalProducts / $perPage);
// Get the current page from the request, defaulting to 1 if not provided
$currentPage = request()->get('page', 1);
// Calculate the offset for the current page
$offset = ($currentPage - 1) * $perPage;
// Slice the products collection to get the products for the current page
$paginatedProducts = $product->slice($offset, $perPage);
@endphp

<style>
    .category-right {
        width: 100%;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .category-right-top-item {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 15px;
        font-size: 18px;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        border-radius: 5px;
    }

    .category-right-content {
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .category-right-content-item {
        width: calc(30% - 16px);
        text-align: center;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .category-right-content-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .category-right-content-item h1 {
        font-size: 16px;
        font-family: 'Arial', sans-serif;
        margin-top: 15px;
        color: #333;
        font-weight: bold;
    }

    .category-right-content-item img {
        height: 90%;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    /* .category-right-content-item:hover img {
        transform: scale(1.1);
    } */

    .category-pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .category-pagination a {
        padding: 10px 15px;
        margin: 0 5px;
        font-size: 14px;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .category-pagination a.active {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }

    .category-pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>

<div class="category-right">
    <div class="grid grid-cols-1 gap-4 text-center max-w-lg mx-auto p-4 rounded ">
        <p class="font-bold text-lg">THƯ VIỆN ẢNH</p>
        <p>Thư viện ảnh khổng lồ với hơn 1000 bộ ảnh thỏa sức cho bạn lựa chọn phong cách phù hợp</p>
    </div>

    <div class="category-right-content">
        @foreach ($paginatedProducts as $item)
        <div class="category-right-content-item">
            <img src="../../../{{ $item->products_image }}" alt="">
            <h1><a href="">{{$item->products_name}}</a></h1>
        </div>
        @endforeach
    </div>

    <div class="category-pagination">
        @for ($i = 1; $i <= $totalPages; $i++) <a href="?page={{$i}}" class="{{ $i == $currentPage ? 'active' : '' }}">{{$i}}</a>
            @endfor
    </div>
</div>

<!-- Review Slider Section -->
<div class="review-slider-container mt-8">
    <div class="w-full mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-4">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2>
        <div class="review-slider relative overflow-hidden">
            <div class="review-slide flex transition-transform duration-500">
                @foreach ($reviews as $review)
                <div class="review-item flex-none w-full p-4">
                    <div class="bg-gray-100 p-6 rounded shadow-md">
                        <div class="flex items-center mb-4">
                            <img src="../../{{ $review->users->image }}" alt="Profile Image" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <p class="font-bold">{{ $review->users->name }}</p>

                            </div>
                        </div>
                        <p class="text-gray-700 text-center text-xl">{{ $review->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="review-slider-controls flex justify-between mt-4">
            <button id="prevReview" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Trước</button>
            <button id="nextReview" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Tiếp</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reviewSlider = document.querySelector('.review-slider');
        const reviewSlide = document.querySelector('.review-slide');
        const prevReview = document.getElementById('prevReview');
        const nextReview = document.getElementById('nextReview');
        const reviewItems = document.querySelectorAll('.review-item');
        let reviewIndex = 0;
        const reviewWidth = reviewSlider.clientWidth;

        nextReview.addEventListener('click', () => {
            if (reviewIndex < reviewItems.length - 1) {
                reviewIndex++;
                reviewSlide.style.transform = `translateX(-${reviewIndex * reviewWidth}px)`;
            }
        });

        prevReview.addEventListener('click', () => {
            if (reviewIndex > 0) {
                reviewIndex--;
                reviewSlide.style.transform = `translateX(-${reviewIndex * reviewWidth}px)`;
            }
        });

        window.addEventListener('resize', () => {
            reviewSlide.style.transform = `translateX(-${reviewIndex * reviewSlider.clientWidth}px)`;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchProducts(page) {
            $.ajax({
                url: "?page=" + page,
                type: "GET",
                success: function(data) {
                    $('.category-right').html($(data).find('.category-right').html());
                    attachPaginationLinks();
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        }

        function attachPaginationLinks() {
            $('.category-pagination a').click(function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);
            });
        }

        attachPaginationLinks();
    });
</script>

@endsection