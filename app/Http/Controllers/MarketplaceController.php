<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('marketplace.index', compact('products', 'categories'));
    }

    public function detail(Product $product)
    {
        return view('product.detail', compact('product'));
    }
}
