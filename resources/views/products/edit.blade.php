@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-xl">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Edit Product
        </h1>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="font-semibold text-gray-700">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required
                       class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="3" required
                          class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400">{{ $product->description }}</textarea>
            </div>

            <!-- PRICE -->
            <div>
                <label class="font-semibold text-gray-700">Price (IDR)</label>
                <input type="number" name="price" value="{{ $product->price }}" required
                       class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- STOCK -->
            <div>
                <label class="font-semibold text-gray-700">Stock Quantity</label>
                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" required
                       class="w-full mt-2 px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="font-semibold text-gray-700">Category</label>
                <select name="category_id" class="w-full mt-2 px-4 py-3 border rounded-xl">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- CURRENT IMAGE -->
            @if($product->image)
            <div>
                <p class="font-semibold text-gray-700 mb-2">Current Image</p>
                <img src="{{ asset('storage/' . $product->image) }}" class="h-40 rounded-xl">
            </div>
            @endif

            <!-- UPLOAD -->
            <div>
                <label class="font-semibold text-gray-700">Change Image</label>
                <input type="file" name="image" class="w-full mt-2 px-4 py-3 border rounded-xl bg-white">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                    Update Product
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
