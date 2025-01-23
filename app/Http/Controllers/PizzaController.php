<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
        ]);

        // Afbeelding uploaden
        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('images', 'public');
        }

        Pizza::create($validateData);

        return redirect()->route('pizzas.index');
    }

    public function show(string $index)
    {
        $pizza = Pizza::findOrFail($index);
        return view('pizzas.show', ['pizza' => $pizza, "id" => $index]);
    }

    public function edit(Pizza $pizza)
    {
        return view('pizzas.edit', ['pizza' => $pizza]);
    }

    public function update(Request $request, Pizza $pizza)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
        ]);

        // Afbeelding uploaden (indien aanwezig)
        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('images', 'public');
        } else {
            // Behoud de oude afbeelding als er geen nieuwe wordt geüpload
            $validateData['image'] = $pizza->image;
        }

        // Pizza bijwerken
        $pizza->update($validateData);

        // Redirect naar de specifieke pizza na update, niet naar de index
        return redirect()->route('pizzas.show', $pizza->id);
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizzas.index');
    }
}
