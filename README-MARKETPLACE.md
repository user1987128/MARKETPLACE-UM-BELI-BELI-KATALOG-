# UM Beli Beli Marketplace - Running Instructions

## Requirements
- PHP 8.x or newer
- Composer
- Database (MySQL, SQLite, etc.)

## Setup Steps

1. Clone the repository (if applicable):
```
git clone <repository-url>
cd <repository-folder>
```

2. Install PHP dependencies:
```
composer install
```

3. Create `.env` file by copying `.env.example`:
```
cp .env.example .env
```

4. Configure your database connection settings in the `.env` file.

5. Generate application key:
```
php artisan key:generate
```

6. Run migrations:
```
php artisan migrate
```

7. Seed the database with sample data:
```
php artisan db:seed
```

8. Start the development server:
```
php artisan serve
```

9. Open your browser at http://localhost:8000 to access the UM Beli Beli marketplace.

---

You can browse products, view product details, add products to cart, and proceed to checkout.

Enjoy your marketplace!
