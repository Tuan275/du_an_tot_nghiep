@extends('client.layout.master')
@section('content')
<style>
    .category-section {
        margin-bottom: 30px;
    }

    .category-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .products-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-item {
        width: calc(25% - 12px);
        text-align: center;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .product-item img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-name {
        font-size: 16px;
        margin-top: 6px;
        color: #333;
    }
</style>
<div class="grid">
    @foreach ($product as $category => $items)
    <div class="category-section">
        <p class="category-title">{{ $category->name }}</p>
        <div class="products-container">
           
            <div class="product-item">
                <img src="../../../{{ $item->products_image }}" alt="">
                <p class="product-name">{{ $item->products_name }}</p>
            </div>
           
        </div>
    </div>
    @endforeach
</div>
@endsection
