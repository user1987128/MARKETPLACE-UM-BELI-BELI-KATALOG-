@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Order Details</h2>

    <div class="card">
        <div class="card-header">
            <h5>Order #{{ $order->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Order Information</h6>
                    <p><strong>Status:</strong>
                        @if($order->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($order->status === 'completed')
                            <span class="badge badge-success">Completed</span>
                        @elseif($order->status === 'cancelled')
                            <span class="badge badge-danger">Cancelled</span>
                        @else
                            <span class="badge badge-secondary">{{ ucfirst($order->status) }}</span>
                        @endif
                    </p>
                    <p><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Shipping Information</h6>
                    <p><strong>Fullname:</strong> {{ $order->fullname }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                </div>
            </div>

            <hr>

            <h6>Products Ordered</h6>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to My Orders</a>
        <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
    </div>
</div>
@endsection
