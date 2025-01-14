<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stonkspizza Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-green-600 text-white p-4 flex justify-between items-center shadow-md">
    <div class="flex items-center">
        <img src="/images/image 4.png" alt="Stonkspizza Logo" class="h-16 w-auto mr-3">
        <h1 class="text-2xl font-extrabold tracking-wide">Stonkspizza</h1>
    </div>
    <nav class="space-x-6">
        <a href="{{route('home.index')}}" class="hover:underline hover:text-gray-200">Home</a>
        <a href="{{route('pizzas.index')}}" class="hover:underline hover:text-gray-200">Menu</a>
        <a href="{{route('contact.index')}}" class="hover:underline hover:text-gray-200">Contact</a>
        <a href="/winkelmand" class="hover:underline hover:text-gray-200">Winkelmand</a>
    </nav>
</header>

<main class="container mx-auto p-6">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($pizzas as $pizza)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/images/{{ $pizza->image }}" alt="{{ $pizza->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $pizza->name }}</h2>
                    <p class="mt-2 text-gray-700">€{{ $pizza->price }}</p>
                    <a href="{{route('order.create')}}"
                       class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Bestel Nu
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</main>
</body>
</html>
