@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Checkout</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['product']->name }}</td>
                    <td>$ {{ number_format($item['product']->price, 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>$ {{ number_format($item['product']->price * $item['quantity'], 2) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-right">Grand Total</th>
                    <th>
                        $ {{ number_format(collect($cart)->sum(function($item) {
                            return $item['product']->price * $item['quantity'];
                        }), 2) }}
                    </th>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    @else
        <p>Your cart is empty.</p>
        <a href="{{ route('marketplace') }}" class="btn btn-primary">Back to Marketplace</a>
    @endif
</div>
@endsection
