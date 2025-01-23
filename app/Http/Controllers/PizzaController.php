<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();

        return view('pizzas/index', compact('pizzas'));
    }
    public function create()
    {
        return view('pizzas.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' =>'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' =>'required',


        ]);

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
        return view('pizzas.edit',['pizza' => $pizza]);
    }

    public function update(Request $request, Pizza $pizza)
    {

        $validateData= $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'price' => 'required',
        ]);

        $pizza->update($validateData);

        return redirect()->route('pizzas.index');
    }
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();

        return redirect()->route('pizza.index');
    }

}
