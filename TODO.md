# Design Upgrade and Bug Fix Tasks

## Marketplace Page Design Enhancement
- [x] Enhance product card design in resources/views/marketplace/index.blade.php for cleaner, modern look with prominent images and vertical stacking.

## Product Detail Page Conversion
- [x] Convert resources/views/product/detail.blade.php from Tailwind CSS to Bootstrap 5.
- [x] Implement two-column layout: Left for image/gallery, Right for product details (name, form for quantity, price, description, 'Add to Cart' button).

## My Orders Page Bug Fix
- [x] Fix 'View' button in resources/views/orders/index.blade.php to link to route('orders.show', $order->id).

## Commit and Push
- [ ] Commit all changes.
- [ ] Push changes to repository.
