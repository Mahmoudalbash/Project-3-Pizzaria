<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('order.js')
</head>

<body class="bg-gray-50">

<!-- Header -->
<header class="bg-green-600 text-white py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex items-center">
            <img src="/images/image 4.png" alt="Stonkspizza Logo" class="h-12 w-auto mr-3">
            <h1 class="text-xl md:text-2xl font-bold tracking-wide">Stonkspizza</h1>
        </div>
        <nav class="space-x-4 text-sm md:text-base">
            <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-3 py-2 rounded-lg hover:bg-indigo-500 transition">Log in voor Admin</a>
            <a href="{{ route('home.index') }}" class="hover:underline">Home</a>
            <a href="{{ route('pizzas.index') }}" class="hover:underline">Menu</a>
            <a href="{{ route('contact.index') }}" class="hover:underline">Contact</a>
            <a href="{{ route('cart.index') }}" class="hover:underline">Winkelmand</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto py-8 px-4">
    <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Order Pizza</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <!-- Pizza Name displayed above -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Pizza: {{ $pizza->name }}</h3>
            <!-- Hidden input to send pizza_id -->
            <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
        </div>

        <!-- Format Selection -->
        <div class="mb-4">
            <label for="format_id" class="block text-gray-700">Formaat:</label>
            <select name="format_id" id="format_id" class="w-full mt-2 p-2 border rounded" required>
                @foreach($formats as $format)
                    <option value="{{ $format->id }}" data-price="{{ $format->price }}">{{ $format->size }}</option>
                @endforeach
            </select>
        </div>

        <!-- Ingredients Selection -->
        <div class="mb-4">
            <label for="ingredients" class="block text-gray-700">Ingrediënten:</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($ingredients as $ingredient)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" class="ingredient-input"
                               aria-label="{{ $ingredient->name }} (€{{ number_format($ingredient->price, 2, ',', '.') }})">
                        <span class="ml-2">{{ $ingredient->name }} (€{{ number_format($ingredient->price, 2, ',', '.') }})</span>
                    </label>
                @endforeach
            </div>
        </div>


        <!-- Total Price Display -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Totale Prijs:</label>
            <p class="text-lg font-bold text-gray-700">€<span id="total-price">0.00</span></p>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Bestelling Plaatsen
            </button>
        </div>
    </form>
</main>

</body>

</html>
