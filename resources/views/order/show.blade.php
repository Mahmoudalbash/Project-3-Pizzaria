<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestel - {{ $pizza->name ?? 'Pizza' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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
        <a href="/winkelmand" class="hover:underline hover:text-gray-200">Winkelmand</a>
    </nav>
</header>

<main class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-green-600 mb-6">Bestel jouw {{ $pizza->name ?? 'Pizza' }}</h2>

    @if($pizza)
        <form action="{{ route('order.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">

            <!-- Pizza Grootte -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kies een grootte:</label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="size" value="small" required class="form-radio">
                        <span class="ml-2">Small (€{{ $pizza->price }})</span>
                    </label><br>
                    <label class="inline-flex items-center">
                        <input type="radio" name="size" value="medium" class="form-radio">
                        <span class="ml-2">Medium (€{{ $pizza->price + 2 }})</span>
                    </label><br>
                    <label class="inline-flex items-center">
                        <input type="radio" name="size" value="large" class="form-radio">
                        <span class="ml-2">Large (€{{ $pizza->price + 4 }})</span>
                    </label>
                </div>
            </div>

            <!-- Extra Ingrediënten -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Extra ingrediënten:</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($ingredients as $ingredient)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                                   class="form-checkbox">
                            <span class="ml-2">{{ $ingredient->name }} (€{{ $ingredient->price }})</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Bestellen
            </button>
            <a href="{{ route('pizzas.index') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Terug</a>

        </form>
    @else
        <p class="text-red-600">Sorry, de geselecteerde pizza kon niet worden gevonden.</p>
    @endif
</main>
</body>
</html>
