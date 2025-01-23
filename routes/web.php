<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('/home', HomeController::class);

    route::resource('/contact', ContactController::class)->except(['index', 'show']);
});

//home
Route::resource('/home', HomeController::class);

Route::get('pizzas/index', [PizzaController::class, 'index'])->name('pizzas.index');
Route::get('/songs/{index}', [PizzaController::class, 'show'])->name('pizzas.show');


Route::middleware('auth')->group(function () {
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');

    Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
    Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
    Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
});




route::get('contact', [ContactController::class, 'index'])->name('contact.index');

//contact
route::resource('/contact', ContactController::class);

//order
route::resource('/order', OrderController::class);

//cart
route::resource('/cart', CartController::class);

//checkout
route::resource('/checkout', CheckoutController::class);
