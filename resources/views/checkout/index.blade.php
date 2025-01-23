<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afrekenen</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Afrekenen</h2>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Naam:</label>
            <input type="text" id="name" name="name" class="mt-2 w-full py-2 px-4 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700">Adres:</label>
            <input type="text" id="address" name="address" class="mt-2 w-full py-2 px-4 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Telefoonnummer:</label>
            <input type="text" id="phone" name="phone" class="mt-2 w-full py-2 px-4 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Bestelling Plaatsen
            </button>
        </div>
    </form>
</main>
</body>
</html>
