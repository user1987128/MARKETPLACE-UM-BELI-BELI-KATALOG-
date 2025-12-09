@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4">

    {{-- Header --}}
    <div class="row">
        <div class="col-12 text-center my-4">
            <h1 class="display-5">UM beli beli V2</h1>
            <p class="lead">LARIS MANIS JADI DUIT</p>
        </div>
    </div>

    <div class="row">

        {{-- Sidebar kategori (desktop) --}}
        <div class="col-md-3 d-none d-md-block">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('marketplace') }}">Semua Produk</a></li>
                        <li><a href="{{ route('marketplace', ['category'=>'alat-tulis']) }}">Alat Tulis</a></li>
                        <li><a href="{{ route('marketplace', ['category'=>'clothing']) }}">Clothing</a></li>
                        <li><a href="{{ route('marketplace', ['category'=>'aksesoris']) }}">Aksesoris</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Produk --}}
        <div class="col-md-9">

            <div class="row mb-3 align-items-center">
                <div class="col-6">
                    <h3>Produk Terbaru</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('marketplace') }}" class="btn btn-link">
                        Lihat Semua
                    </a>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-4 g-3">

                @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 product-card border-0 shadow-sm">

                        {{-- IMAGE --}}
                        <a href="{{ route('product.detail', $product->id) }}">
                            @if($product->image)
                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="card-img-top"
                                    style="height:220px;object-fit:cover"
                                    alt="{{ $product->name }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                     style="height:220px">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif
                        </a>

                        {{-- BODY --}}
                        <div class="card-body p-2">
                            <h6 class="mb-1 text-truncate">{{ $product->name }}</h6>

                            <p class="mb-1 fw-bold text-primary">
                                Rp {{ number_format($product->price,0,',','.') }}
                            </p>

                            <small class="text-muted">
                                Stok: {{ $product->stock ?? '-' }}
                            </small>
                        </div>

                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada produk ditemukan.</p>
                </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            @if(method_exists($products,'links'))
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/badkid.css') }}">
@endpush
