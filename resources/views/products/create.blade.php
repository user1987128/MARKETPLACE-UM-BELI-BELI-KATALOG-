{"variant":"standard","title":"Create Product Fixed","id":"58291"}
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-xl">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Add New Product
        </h1>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <!-- NAME -->
            <div>
                <label class="font-semibold text-gray-700">Product Name</label>
                <input type="text" name="name" required
                    class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="font-semibold text-gray-700">Description</label>
                <textarea name="description" rows="3" required
                    class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <!-- PRICE -->
            <div>
                <label class="font-semibold text-gray-700">Price (IDR)</label>
                <input type="number" name="price" required
                    class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- SALE PRICE -->
            <div>
                <label class="font-semibold text-gray-700">Sale Price (Optional)</label>
                <input type="number" name="sale_price"
                    class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- STOCK -->
            <div>
                <label class="font-semibold text-gray-700">Stock Quantity</label>
                <input type="number" name="stock_quantity" required
                    class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="font-semibold text-gray-700">Category</label>
                <select name="category_id"
                        class="w-full mt-2 px-4 py-3 border rounded-xl shadow-sm bg-white focus:ring-2 focus:ring-blue-400">
                    <option value="">— Select Category —</option>

                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- IMAGE -->
            <div>
                <label class="font-semibold text-gray-700">Product Image</label>
                <input type="file" name="image"
                    class="w-full mt-2 px-4 py-3 border rounded-xl bg-white shadow-sm focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
                    Save Product
                </button>
            </div>

        </form>
    </div>

</div>

@endsection
