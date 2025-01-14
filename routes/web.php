<?php

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
    Route::resource('/pizzas', PizzaController::class);
    route::resource('/contact', ContactController::class)->except(['index', 'show']);
});

//home
Route::resource('/home', HomeController::class);

//menu
Route::resource('/pizzas', PizzaController::class);

//contact
route::resource('/contact', ContactController::class);

//order
route::resource('/order', OrderController::class);
