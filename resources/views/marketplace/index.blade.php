@extends('layouts.app')

@section('content')

<style>
    /* Card Hover Animation */
    .product-card {
        border: none;
        border-radius: 15px;
        transition: 0.3s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    /* Category Sidebar */
    .category-box {
        border-radius: 12px;
        overflow: hidden;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .category-box .list-group-item.active {
        background-color: #007bff !important;
        border-color: #007bff !important;
        font-weight: bold;
    }

    /* Search styling */
    .search-box input {
        height: 45px;
        border-radius: 10px;
    }
    .search-box button {
        height: 45px;
        border-radius: 10px;
    }

    /* Page Title */
    .title-main {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 25px;
    }
</style>

<h1 class="title-main">Marketplace</h1>

@if(auth()->check() && auth()->user()->isAdmin()) <a href="{{ route('products.create') }}" class="btn btn-primary mb-4" style="border-radius:10px;">
+ Add Product </a>
@endif

<!-- Search Bar -->

<form method="GET" action="{{ route('marketplace') }}" class="form-inline mb-4 search-box">
    <input type="text" name="search" class="form-control mr-2 flex-grow-1" placeholder="Search for products..."
           value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary px-4">Search</button>
</form>

<div class="row">
    <!-- Sidebar Category -->
    <div class="col-md-3">
        <h5 class="mb-3 font-weight-bold">Categories</h5>
        <div class="category-box">
            <ul class="list-group list-group-flush">
                <li class="list-group-item {{ request('category') ? '' : 'active' }}">
                    <a href="{{ route('marketplace', request()->except('category')) }}" 
                       class="{{ request('category') ? 'text-dark' : 'text-white' }}" 
                       style="text-decoration:none;">
                        All Categories
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li class="list-group-item {{ request('category') == $category->id ? 'active' : '' }}">
                        <a href="{{ route('marketplace', array_merge(request()->except('page','category'), ['category'=>$category->id])) }}"
                           class="{{ request('category') == $category->id ? 'text-white' : 'text-dark' }}"
                           style="text-decoration:none;">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


<!-- Product Grid -->
<div class="col-md-9">
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card product-card h-100">
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>

                        <p class="card-text text-muted" style="height: 40px; overflow: hidden;">
                            {{ $product->description }}
                        </p>

                        <p class="card-text font-weight-bold mt-auto" style="font-size: 17px;">
                            $ {{ number_format($product->price, 2) }}
                        </p>

                        <a href="{{ route('product.detail', $product->id) }}"
                           class="btn btn-primary mt-2"
                           style="border-radius:10px;">
                            View Details
                        </a>

                    </div>
                </div>
            </div>
        @empty
            <p class="ml-3">No products found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
</div>


</div>
@endsection
