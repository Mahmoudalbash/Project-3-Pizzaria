<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stonkspizza Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-green-500 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="/images/logo.png" alt="Stonkspizza Logo" class="h-10 mr-3">
        <h1 class="text-xl font-bold">Stonkspizza</h1>
    </div>
    <nav>
        <a href="/" class="text-white mr-4">Home</a>
        <a href="/menu" class="text-white mr-4">Menu</a>
        <a href="/contact" class="text-white mr-4">Contact</a>
        <a href="/winkelmand" class="text-white">Winkelmand</a>
    </nav>
</header>

<main class="container mx-auto p-6">
    <div class="grid grid-cols-2 gap-4">
        @foreach ($pizzas as $pizza)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/images/{{ $pizza->image }}" alt="{{ $pizza->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $pizza->name }}</h2>
                    <div class="mt-2 flex justify-between items-center">
                        <span class="text-gray-700 font-bold">€{{ $pizza->price }}</span>
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Bestel Nu
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
</body>
</html>

