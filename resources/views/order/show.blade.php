<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/order.js')
</head>

<body class="bg-gray-50">

<header class="bg-green-600 text-white p-4 flex justify-between items-center shadow-md">
    <div class="flex items-center">
        <img src="/images/image 4.png" alt="Stonkspizza Logo" class="h-16 w-auto mr-3">
        <h1 class="text-2xl font-extrabold tracking-wide">Stonkspizza</h1>
    </div>
    <nav class="space-x-6">
        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Log in voor Admin </a>
        <a href="{{route('home.index')}}" class="hover:underline hover:text-gray-200">Home</a>
        <a href="{{route('pizzas.index')}}" class="hover:underline hover:text-gray-200">Menu</a>
        <a href="{{route('contact.index')}}" class="hover:underline hover:text-gray-200">Contact</a>
        <a href="{{route('cart.index')}}" class="hover:underline hover:text-gray-200">Winkelmand</a>
    </nav>
</header>

<main class="container mx-auto py-8 px-4">
    <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Order Pizza</h2>

    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Pizza: {{ $pizza->name }}</h3>
            <input type="hidden" id="base-price" value="{{ $pizza->price }}">
            <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
        </div>

        <div class="mb-4">
            <label for="format_id" class="block text-gray-700">Formaat:</label>
            <select id="size" name="format_id" class="mt-4 w-full py-2 px-4 border border-gray-300 rounded">
                @foreach($formats as $format)
                    <option value="{{ $format->id }}" data-price="{{ $format->price }}">
                        {{ $format->size }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="ingredients" class="block text-gray-700">Ingrediënten:</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($ingredients as $ingredient)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                               class="ingredient-input"
                               data-price="{{ $ingredient->price }}"
                               aria-label="{{ $ingredient->name }} (€{{ number_format($ingredient->price, 2, ',', '.') }})">
                        <span class="ml-2">{{ $ingredient->name }} (€{{ number_format($ingredient->price, 2, ',', '.') }})</span>
                    </label>
                @endforeach

            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Totale Prijs:</label>
            <p class="text-lg font-bold text-gray-700">€<span id="total-price">0.00</span></p>
        </div>

        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Bestelling Plaatsen
            </button>
        </div>
    </form>

    <!-- Knop naar Menu -->
    <div class="mt-4">
        <a href="{{ route('pizzas.index') }}"
           class="w-full block text-center bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded-lg transition">
            Terug naar Menu
        </a>
    </div>
</main>

</body>
</html>
