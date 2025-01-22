<!-- resources/views/order/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<header class="bg-green-600 text-white py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex items-center">
            <img src="/images/image 4.png" alt="Stonkspizza Logo" class="h-12 w-auto mr-3">
            <h1 class="text-xl md:text-2xl font-bold tracking-wide">Stonkspizza</h1>
        </div>
        <nav class="space-x-4 text-sm md:text-base">
            <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-3 py-2 rounded-lg hover:bg-indigo-500 transition">Log in voor Admin</a>
            <a href="{{route('home.index')}}" class="hover:underline">Home</a>
            <a href="{{route('pizzas.index')}}" class="hover:underline">Menu</a>
            <a href="{{route('contact.index')}}" class="hover:underline">Contact</a>
            <a href="{{route('cart.index')}}" class="hover:underline">Winkelmand</a>
        </nav>
    </div>
</header>

<main class="container mx-auto py-8 px-4">
    <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Order Pizza</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="pizza_id" class="block text-gray-700">Pizza:</label>
            <select name="pizza_id" id="pizza_id" class="w-full mt-2 p-2 border rounded">
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="format_id" class="block text-gray-700">Formaat:</label>
            <select name="format_id" id="format_id" class="w-full mt-2 p-2 border rounded">
                @foreach($formats as $format)
                    <option value="{{ $format->id }}">{{ $format->size }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="ingredients" class="block text-gray-700">Ingrediënten:</label>
            @foreach($ingredients as $ingredient)
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}">
                    <span class="ml-2">{{ $ingredient->name }}</span>
                </label>
            @endforeach
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Order</button>
    </form>
</main>

</body>
</html>
