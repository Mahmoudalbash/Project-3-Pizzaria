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

        // Bereken de totale prijs
        $ingredientsTotal = $ingredients->sum('price');
        $sizeFactor = $format->size === 'small' ? 0.8 : ($format->size === 'medium' ? 1 : 1.2);
        $totalPrice = ($pizza->price + $ingredientsTotal) * $sizeFactor;

        // Verkrijg winkelmand uit sessie
        $cart = session()->get('cart', []);

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Pizza toegevoegd aan winkelmand!');
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
