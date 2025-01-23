<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmand</title>
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
    <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Jouw Winkelmand</h2>
    <table class="min-w-full bg-white">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">Pizza</th>
            <th class="py-2 px-4 border-b">Formaat</th>
            <th class="py-2 px-4 border-b">Ingrediënten</th>
            <th class="py-2 px-4 border-b">Aantal</th>
            <th class="py-2 px-4 border-b">Prijs</th>
            <th class="py-2 px-4 border-b">Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $index => $item)
            <tr class="even:bg-gray-50">
                <td class="py-3 px-4 border-b">{{ $item['pizza_name'] }}</td>
                <td class="py-3 px-4 border-b">{{ $item['format_size'] }}</td>
                <td class="py-3 px-4 border-b">
                    @foreach($item['ingredients_names'] as $ingredientName)
                        <span class="inline-block bg-gray-200 text-sm text-gray-600 px-2 py-1 rounded-lg mr-1 mb-1">{{ $ingredientName }}</span>
                    @endforeach
                </td>
                <td class="py-3 px-4 border-b">{{ $item['quantity'] ?? 1 }}</td>
                <td class="py-3 px-4 border-b">€{{ number_format($item['total_price'], 2, ',', '.') }}</td>
                <td class="py-3 px-4 border-b">
                    <form action="{{ route('cart.destroy', $index) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
