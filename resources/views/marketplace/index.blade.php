@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <div class="row">
        <div class="col-12">
            <h1 class="title-main text-center text-md-start">
                <i class="bi bi-shop me-2 d-none d-md-inline"></i>
                Marketplace
            </h1>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="text-center text-md-start mb-4">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>
                        Add Product
                    </a>
                </div>
            @endif

            <!-- Mobile Filter Toggle -->
            <div class="d-md-none mb-3">
                <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#filterSidebar">
                    <i class="bi bi-funnel me-2"></i>
                    Filters & Categories
                    <i class="bi bi-chevron-down ms-2"></i>
                </button>
            </div>

            <!-- Search Bar -->
            <div class="search-box mb-4">
                <form method="GET" action="{{ route('marketplace') }}" class="row g-2">
                    <div class="col-12 col-md-8">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" class="form-control"
                                   placeholder="Search for products..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search me-2"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="row">
                <!-- Sidebar Category - Desktop -->
                <div class="col-md-3 d-none d-md-block">
                    <div class="category-box sticky-top" style="top: 20px;">
                        <h5 class="mb-3">
                            <i class="bi bi-tags me-2"></i>
                            Categories
                        </h5>
                        <div class="list-group">
                            <a href="{{ route('marketplace', request()->except('category')) }}"
                               class="list-group-item list-group-item-action {{ request('category') ? '' : 'active' }}">
                                <i class="bi bi-grid me-2"></i>
                                All Categories
                            </a>
                            @foreach ($categories as $category)
                                <a href="{{ route('marketplace', array_merge(request()->except('page','category'), ['category'=>$category->id])) }}"
                                   class="list-group-item list-group-item-action {{ request('category') == $category->id ? 'active' : '' }}">
                                    <i class="bi bi-tag me-2"></i>
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile Filter Sidebar -->
                <div class="col-12 d-md-none">
                    <div class="collapse" id="filterSidebar">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">
                                    <i class="bi bi-tags me-2"></i>
                                    Categories
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <a href="{{ route('marketplace', request()->except('category')) }}"
                                       class="list-group-item list-group-item-action {{ request('category') ? '' : 'active' }}">
                                        <i class="bi bi-grid me-2"></i>
                                        All Categories
                                    </a>
                                    @foreach ($categories as $category)
                                        <a href="{{ route('marketplace', array_merge(request()->except('page','category'), ['category'=>$category->id])) }}"
                                           class="list-group-item list-group-item-action {{ request('category') == $category->id ? 'active' : '' }}">
                                            <i class="bi bi-tag me-2"></i>
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-12 col-md-9">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
                        @forelse ($products as $product)
                            <div class="col">
                                <div class="card product-card h-100 border-0 shadow-sm">
                                    @if($product->image)
                                        <div class="position-relative overflow-hidden">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 class="card-img-top w-100"
                                                 alt="{{ $product->name }}"
                                                 style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                        </div>
                                    @else
                                        <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                             style="height: 250px;">
                                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                        </div>
                                    @endif

                                    <div class="card-body d-flex flex-column p-3">
                                        <h6 class="card-title fw-bold mb-2 text-truncate" style="font-size: 1.1rem;">{{ $product->name }}</h6>

                                        <p class="card-text text-muted small mb-3" style="height: 48px; overflow: hidden; line-height: 1.4;">
                                            {{ Str::limit($product->description, 80) }}
                                        </p>

                                        <div class="mt-auto">
                                            <div class="d-flex flex-column mb-3">
                                                <span class="h6 text-primary fw-bold mb-1">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </span>
                                                <small class="text-muted">
                                                    <i class="bi bi-box-seam me-1"></i>
                                                    {{ $product->stock_quantity }} in stock
                                                </small>
                                            </div>

                                            <a href="{{ route('product.detail', $product->id) }}"
                                               class="btn btn-dark w-100 rounded-pill">
                                                <i class="bi bi-eye me-2"></i>
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                                    <h4 class="text-muted mt-3">No products found</h4>
                                    <p class="text-muted">Try adjusting your search or filter criteria.</p>
                                    <a href="{{ route('marketplace') }}" class="btn btn-primary">
                                        <i class="bi bi-arrow-left me-2"></i>
                                        Back to All Products
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->appends(request()->except('page'))->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Mobile Responsiveness */
@media (max-width: 767.98px) {
    .title-main {
        font-size: 2rem !important;
        margin-bottom: 1rem !important;
    }

    .search-box .input-group-text {
        padding: 0.5rem;
    }

    .product-card .card-img-top {
        height: 150px !important;
    }

    .product-card .card-body {
        padding: 1rem 0.75rem;
    }

    .product-card .card-title {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .category-box {
        margin-bottom: 1rem;
    }
}

@media (min-width: 768px) {
    .product-card .card-img-top {
        height: 180px;
    }
}

@media (min-width: 992px) {
    .product-card .card-img-top {
        height: 200px;
    }
}

/* Enhanced Card Styling */
.product-card {
    border: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.product-card .card-img-top {
    transition: transform 0.3s ease;
}

.product-card:hover .card-img-top {
    transform: scale(1.05);
}

/* Category Sidebar */
.category-box .list-group-item {
    border: none;
    border-radius: 8px !important;
    margin-bottom: 0.25rem;
    transition: all 0.2s ease;
}

.category-box .list-group-item:hover {
    background-color: rgba(13, 110, 253, 0.1);
    transform: translateX(4px);
}

.category-box .list-group-item.active {
    background-color: var(--primary-color) !important;
    border-color: var(--primary-color) !important;
    color: white;
    font-weight: 600;
}

/* Search Box */
.search-box .form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    font-size: 1rem;
}

.search-box .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

/* Sticky sidebar for desktop */
@media (min-width: 768px) {
    .sticky-top {
        position: sticky;
        top: 20px;
    }
}

/* Loading animation for images */
.product-card img {
    transition: opacity 0.3s ease;
}

.product-card img[src=""] {
    opacity: 0;
}

.product-card img:not([src=""]) {
    opacity: 1;
}
</style>
@endsection
