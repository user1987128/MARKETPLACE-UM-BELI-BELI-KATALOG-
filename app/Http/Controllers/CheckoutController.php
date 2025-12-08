<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // VALIDASI — Cocok dengan input checkout kamu
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:bank_transfer,cod,ewallet',
        ]);

        $userId = Auth::id();

        // Hitung total
        $totalAmount = collect($cart)->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });

        // SIMPAN ORDER
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
        ]);

        // SIMPAN ITEM ORDER
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
            ]);
        }

        // KOSONGKAN CART
        Session::forget('cart');

        return redirect()->route('marketplace')->with('success', 'Order placed successfully!');
    }
}
