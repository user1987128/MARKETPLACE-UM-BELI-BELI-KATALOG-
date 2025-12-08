@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Guide</h1>

    <div class="card">
        <div class="card-body">
            <h2>Admin Login</h2>
            <p>To access the admin features, you need to log in with an admin account. Admin accounts are created with the role 'admin' in the users table.</p>
            <ol>
                <li>Go to the login page.</li>
                <li>Enter your admin username and password.</li>
                <li>Upon successful login, you will have access to admin-only features.</li>
            </ol>

            <h2>Managing Products</h2>
            <h3>How to Add a Product</h3>
            <ol>
                <li>Navigate to the Products section in the admin panel.</li>
                <li>Click on "Create Product".</li>
                <li>Fill in the product details: name, description, price, stock quantity, sale price (optional), and category.</li>
                <li>Upload an image if available.</li>
                <li>Click "Save" to add the product.</li>
            </ol>

            <h3>How to Edit a Product</h3>
            <ol>
                <li>Go to the Products list.</li>
                <li>Find the product you want to edit and click "Edit".</li>
                <li>Update the necessary fields.</li>
                <li>Click "Update" to save changes.</li>
            </ol>

            <h3>How to Delete a Product</h3>
            <ol>
                <li>In the Products list, click "Delete" next to the product.</li>
                <li>Confirm the deletion.</li>
            </ol>

            <h2>Managing Categories</h2>
            <h3>How to Add a Category</h3>
            <ol>
                <li>Access the Categories section.</li>
                <li>Click "Add Category".</li>
                <li>Enter the category name and description.</li>
                <li>Save the category.</li>
            </ol>

            <h3>How to Edit a Category</h3>
            <ol>
                <li>From the Categories list, select "Edit" for the desired category.</li>
                <li>Modify the name or description.</li>
                <li>Save the changes.</li>
            </ol>

            <h3>How to Delete a Category</h3>
            <ol>
                <li>In the Categories list, click "Delete".</li>
                <li>Confirm the action.</li>
            </ol>

            <h2>Managing Orders</h2>
            <p>As an admin, you can view all orders placed by users.</p>
            <ol>
                <li>Go to the Orders section.</li>
                <li>View the list of all orders.</li>
                <li>Click on an order to see details, including items, quantities, and user information.</li>
                <li>Update order status if necessary (e.g., pending, shipped, delivered).</li>
            </ol>

            <h2>Managing Users</h2>
            <p>You can view and manage user accounts.</p>
            <ol>
                <li>Access the Users section.</li>
                <li>View the list of registered users.</li>
                <li>Edit user details or roles if needed.</li>
                <li>Deactivate or delete user accounts if necessary.</li>
            </ol>

            <h2>System Settings</h2>
            <p>Optional: Configure system-wide settings such as email notifications, payment gateways, or site configurations.</p>
            <ol>
                <li>Navigate to Settings.</li>
                <li>Update configurations as required.</li>
                <li>Save changes.</li>
            </ol>
        </div>
    </div>
</div>
@endsection
