@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Daftar Produk</h1>

    @auth
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
        @endif
    @endauth

    <div class="row">
        @forelse($products as $p)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->name }}</h5>
                        <p class="card-text">{{ $p->description }}</p>
                        <p class="card-text">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                        @if($p->sale_price)
                            <p class="card-text">Harga Jual: Rp {{ number_format($p->sale_price, 0, ',', '.') }}</p>
                        @endif
                        <p class="card-text">Stok: {{ $p->stock_quantity }}</p>
                        <a href="{{ route('product.detail', $p) }}" class="btn btn-info">Detail</a>

                        @if(auth()->check() && auth()->user()->role == 'admin')
                            <a href="{{ route('products.edit', $p) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada produk.</p>
        @endforelse
    </div>
</div>
@endsection
