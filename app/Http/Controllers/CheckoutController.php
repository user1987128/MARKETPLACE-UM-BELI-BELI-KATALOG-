<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    /**
     * Show the checkout form.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    /**
     * Process the checkout submission.
     */
    public function process(Request $request)
    {
        $cart = Session::get('cart', []);

        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|in:bank_transfer,cod,dana,ovo,gopay',
        ]);

        $userId = Auth::check() ? Auth::id() : null;

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Create new order
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
        ]);

        // Create order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('marketplace')->with('success', 'Order placed successfully!');
    }
}
