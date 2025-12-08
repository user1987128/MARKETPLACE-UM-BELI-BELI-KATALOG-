@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Orders</h2>

    @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="{{ $order->status === 'pending' ? 'table-warning' : '' }}">
                            <td>#{{ $order->id }}</td>
                            <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>
                                @if($order->status === 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @elseif($order->status === 'cancelled')
                                    <span class="badge badge-danger">Cancelled</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</td>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $order->address }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($order->orderItems as $item)
                                        <li>{{ $item->product->name }} ({{ $item->quantity }}x) - Rp {{ number_format($item->price, 0, ',', '.') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-secondary">Print Invoice</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $orders->links() }}
    @else
        <div class="alert alert-info">
            You haven't placed any orders yet.
        </div>
    @endif
</div>
@endsection
