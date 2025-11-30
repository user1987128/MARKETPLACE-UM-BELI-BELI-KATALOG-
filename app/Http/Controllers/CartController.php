<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        $productId = $product->id;

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        $productId = $product->id;

        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart.');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    /**
     * Update product quantity in the cart.
     */
    public function update(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        $productId = $product->id;

        if(isset($cart[$productId]) && $request->filled('quantity')) {
            $quantity = max(1, (int)$request->quantity);
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated.');
        }

        return redirect()->back()->with('error', 'Invalid request.');
    }
}
