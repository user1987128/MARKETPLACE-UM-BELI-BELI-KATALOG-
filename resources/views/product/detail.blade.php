@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card border-0 shadow-lg">
                <div class="row g-0">
                    <!-- Left Column: Main Product Image/Gallery -->
                    <div class="col-md-6">
                        <div class="p-4 p-md-5 d-flex align-items-center justify-content-center" style="min-height: 500px;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="img-fluid rounded shadow"
                                     alt="{{ $product->name }}"
                                     style="max-height: 500px; object-fit: contain;">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                     style="width: 100%; height: 400px;">
                                    <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Column: Product Details -->
                    <div class="col-md-6">
                        <div class="card-body p-4 p-md-5">
                            <!-- Product Name -->
                            <h1 class="card-title display-5 fw-bold mb-3">{{ $product->name }}</h1>

                            <!-- Product Description -->
                            <p class="card-text text-muted mb-4 lead">{{ $product->description }}</p>

                            <!-- Price -->
                            <h3 class="text-primary fw-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                            <!-- Category -->
                            <p class="text-muted mb-2">
                                <strong>Category:</strong> {{ $product->category->name }}
                            </p>

                            <!-- Stock -->
                            <p class="text-muted mb-4">
                                <strong>Stock:</strong> {{ $product->stock_quantity }} available
                            </p>

                            <!-- Form for Quantity and Add to Cart -->
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                                @csrf
                                <div class="row g-3 align-items-end">
                                    <div class="col-4">
                                        <label for="quantity" class="form-label fw-semibold">Quantity</label>
                                        <input type="number" id="quantity" name="quantity" class="form-control"
                                               value="1" min="1" max="{{ $product->stock_quantity }}" required>
                                    </div>
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-dark btn-lg w-100 rounded-pill">
                                            <i class="bi bi-cart-plus me-2"></i>
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
