<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('pizzas.index', ['pizzas' => Pizza::all()]);
    }

    public function create()
    {
        return view('order.show', [
            'pizza' => Pizza::all(),
            'ingredients' => Ingredient::all(),
            'formats' => Format::all(),
        ]);
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

        // Voeg bestelling toe aan winkelmand via sessie
        session()->push('cart', [
            'pizza_id' => $pizza->id,
            'format_id' => $format->id,
            'ingredients' => $ingredients->pluck('id')->toArray(),
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('cart.show')->with('success', 'Bestelling toegevoegd aan winkelmand!');
    }

    public function show(string $id)
    {
        return view('order.show', [
            'pizza' => Pizza::findOrFail($id),
            'ingredients' => Ingredient::all(),
            'formats' => Format::all(),
        ]);
    }
}
