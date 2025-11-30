@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-xl grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- IMAGE -->
        <div>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                     class="w-full rounded-2xl shadow">
            @else
                <div class="w-full h-64 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500">
                    No Image
                </div>
            @endif
        </div>

        <!-- INFO -->
        <div>
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>

            <p class="text-gray-600 mb-4">{{ $product->description }}</p>

            <p class="text-2xl font-bold text-blue-600 mb-6">Rp {{ number_format($product->price) }}</p>

            <!-- CATEGORY -->
            <p class="text-sm text-gray-500 mb-4">
                Category: <span class="font-semibold">{{ $product->category->name }}</span>
            </p>

            <!-- STOCK -->
            <p class="text-sm text-gray-500 mb-6">
                Stock: <span class="font-semibold">{{ $product->stock_quantity }}</span>
            </p>

            <!-- ADD TO CART -->
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button class="w-full px-6 py-3 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
                    Add to Cart
                </button>
            </form>

        </div>

    </div>

</div>
@endsection
