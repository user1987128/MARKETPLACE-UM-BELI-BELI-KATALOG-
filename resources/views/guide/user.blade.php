@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">User Guide</h1>

    <div class="card">
        <div class="card-body">
            <h2>How to Register</h2>
            <ol>
                <li>Click on the "Register" link in the navigation bar.</li>
                <li>Fill in your name, email, and password.</li>
                <li>Click "Register" to create your account.</li>
                <li>You will be redirected to the login page after successful registration.</li>
            </ol>

            <h2>How to Login</h2>
            <ol>
                <li>Click on the "Login" link in the navigation bar.</li>
                <li>Enter your email and password.</li>
                <li>Click "Login" to access your account.</li>
            </ol>

            <h2>How to Search for Products</h2>
            <ol>
                <li>On the marketplace homepage, use the search bar to enter keywords.</li>
                <li>Press Enter or click the search button.</li>
                <li>Browse the filtered results.</li>
            </ol>

            <h2>How to Browse Categories</h2>
            <ol>
                <li>Visit the marketplace homepage.</li>
                <li>Click on category links or filters to view products by category.</li>
                <li>Explore products within the selected category.</li>
            </ol>

            <h2>How to View Product Details</h2>
            <ol>
                <li>From the product list or search results, click on a product name or image.</li>
                <li>View detailed information including description, price, and stock.</li>
            </ol>

            <h2>How to Add Items to Cart</h2>
            <ol>
                <li>Go to the product detail page.</li>
                <li>Click "Add to Cart".</li>
                <li>The item will be added to your cart.</li>
                <li>You can view your cart by clicking "Cart" in the navigation.</li>
            </ol>

            <h2>How to Checkout</h2>
            <ol>
                <li>Click "Cart" to review your items.</li>
                <li>Click "Checkout" to proceed.</li>
                <li>Enter your shipping and payment details.</li>
                <li>Confirm the order.</li>
            </ol>

            <h2>How to View Order Status</h2>
            <ol>
                <li>After placing an order, you can view its status in your account dashboard.</li>
                <li>Check for updates on pending, shipped, or delivered orders.</li>
            </ol>

            <h2>How to Logout</h2>
            <ol>
                <li>Click the "Logout" button in the navigation bar.</li>
                <li>You will be logged out and redirected to the homepage.</li>
            </ol>
        </div>
    </div>
</div>
@endsection
