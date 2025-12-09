@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4">
    <div class="row">
        <div class="col-12 text-center my-4">
            <h1 class="display-5">Badkidstore Indonesia — Replica Theme</h1>
            <p class="lead">New arrivals, best seller, and curated picks.</p>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar categories -->
        <div class="col-md-3 d-none d-md-block">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">NEW ARRIVAL</a></li>
                        <li><a href="#">BEST SELLER</a></li>
                        <li><a href="#">Adidas New</a></li>
                        <li><a href="#">Sneakers New</a></li>
                        <li><a href="#">Adidas Second</a></li>
                        <li><a href="#">Merch Badkidstore</a></li>
                        <li><a href="#">Apparel</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Products grid -->
        <div class="col-md-9">
            <div class="row mb-3 align-items-center">
                <div class="col-6">
                    <h3>NEW ARRIVAL</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('products.index') }}" class="btn btn-link">Lihat Semua</a>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-6 col-sm-4 col-md-3 mb-4">
                    <div class="card h-100 product-card">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ $product->getFirstMediaUrl('images') ?: '/images/placeholder.png' }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1">{{ $product->name }}</h6>
                            <p class="mb-1 price">Rp {{ number_format($product->price,0,',','.') }}</p>
                            @if($product->is_on_sale)
                                <p class="mb-0 text-muted small"><del>Rp {{ number_format($product->original_price,0,',','.') }}</del></p>
                            @endif
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                @empty
                <div class="col-12">
                    <p>Tidak ada produk ditemukan.</p>
=======

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
>>>>>>> 6553c7408b9317c8e2c5c85e306d85b58ed95236
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/badkid.css') }}">
@endpush
