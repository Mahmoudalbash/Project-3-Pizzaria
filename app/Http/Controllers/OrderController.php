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
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        $formats = Format::all();
        return view('order.show', [
            'pizzas' => Pizza::all(),
            'ingredients' => Ingredient::all(),
            'formats' => $formats,
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

        return redirect()->route('cart.show')->with('success', 'Bestelling toegevoegd aan winkelmand!');
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id); // Eén specifieke pizza ophalen op basis van ID
        $ingredients = Ingredient::all();
        $formats = Format::all();

        return view('order.show', compact('pizza', 'ingredients', 'formats'));
    }

}
