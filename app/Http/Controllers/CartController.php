<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        $pizzaId = $request->input('pizza_id');
        $formatId = $request->input('format_id');
        $ingredients = $request->input('ingredients', []);

        $cart[] = [
            'pizza_id' => $pizzaId,
            'format_id' => $formatId,
            'ingredients' => $ingredients,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $formats = Format::all();
        $ingredients = ingredient::all();

        foreach ($cart as &$item) {
            $item['pizza'] = Pizza::find($item['pizza_id']);
            $item['format'] = Format::find($item['format_id']);
            $item['ingredients'] = Ingredient::whereIn('id', $item['ingredients'])->get();
        }

        return view('cart.index', compact('cart', 'formats', 'ingredients'));
    }

    public function update(Request $request, $index)
    {
        $cart = session()->get('cart', []);

        $cart[$index]['format_id'] = $request->input('format_id');
        $cart[$index]['ingredients'] = $request->input('ingredients', []);

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }
}
