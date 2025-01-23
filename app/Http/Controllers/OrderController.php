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
            'format_id' => 'required|exists:formats,id', // Validatie voor format_id
        ]);

        $pizza = Pizza::findOrFail($validated['pizza_id']);
        $format = Format::findOrFail($validated['format_id']);
        $ingredients = Ingredient::whereIn('id', $validated['ingredients'] ?? [])->get();

        $ingredientsTotal = $ingredients->sum('price');
        $totalPrice = ($pizza->base_price + $ingredientsTotal) * $format->price;

        return redirect()->route('cart.show')->with('success', 'Bestelling geplaatst! Totale prijs: €' . number_format($totalPrice, 2, ',', '.'));
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
