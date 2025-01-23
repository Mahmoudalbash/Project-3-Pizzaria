<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredients' => 'array',
            'ingredients.*' => 'exists:ingredients,id',
            'format_id' => 'required|exists:formats,id',
        ]);

        $pizza = Pizza::findOrFail($validated['pizza_id']);
        $format = Format::findOrFail($validated['format_id']);
        $ingredients = Ingredient::whereIn('id', $validated['ingredients'] ?? [])->get();

        $ingredientsTotal = $ingredients->sum('price');
        $totalPrice = ($pizza->price + $ingredientsTotal) * $format->price;

        $cart = session()->get('cart', []);
        $cart[] = [
            'pizza_id' => $pizza->id,
            'pizza_name' => $pizza->name,
            'format_id' => $format->id,
            'format_size' => $format->size,
            'ingredients' => $ingredients->pluck('id')->toArray(),
            'ingredients_names' => $ingredients->pluck('name')->toArray(),
            'total_price' => $totalPrice,
            'quantity' => 1,
        ];
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Pizza toegevoegd aan winkelmand!');
    }
}
