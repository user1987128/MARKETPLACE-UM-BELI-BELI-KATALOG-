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
                @empty
                <div class="col-12">
                    <p>Tidak ada produk ditemukan.</p>
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
