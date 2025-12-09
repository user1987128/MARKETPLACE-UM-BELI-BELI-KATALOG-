@extends('layouts.app')
@section('content')
<section class="mb-10">
<div class="aspect-[16/9] bg-gray-100 flex items-center justify-center">
<h2 class="text-3xl font-bold">Produk Terlaris Hari Ini</h2>
</div>
</section>
@include('store.product-grid')
@endsection
