<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $cart = session()->get('cart', []);
        $totalPrice = array_sum(array_column($cart, 'total_price'));

        $order = order::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'total_price' => $totalPrice,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'pizza_id' => $item['pizza_id'],
                'format_id' => $item['format_id'],
                'ingredients' => json_encode($item['ingredients']),
                'quantity' => $item['quantity'] ?? 1,
                'price' => $item['total_price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('home.index');
    }
}
