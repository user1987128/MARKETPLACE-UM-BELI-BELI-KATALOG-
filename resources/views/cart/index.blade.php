@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Your Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th width="120">Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['product']->name }}</td>
                    <td>$ {{ number_format($item['product']->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="form-inline">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm mr-2" style="width: 70px;">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                    <td>$ {{ number_format($item['product']->price * $item['quantity'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
        <a href="{{ route('marketplace') }}" class="btn btn-primary">Back to Marketplace</a>
    @endif
</div>
@endsection
