<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Details - {{ $pizza->name }}</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
    <!-- Kleine afbeelding linksboven -->
    <img src="/images/{{ $pizza->image }}" alt="{{ $pizza->name }}"
         class="w-2 h-14 object-cover absolute top-4 left-4 ">

    <!-- Inhoud met marge om ruimte te maken voor de afbeelding -->
    <div class="pl-32">
        <h1 class="text-3xl font-bold text-green-600 mb-2">{{ $pizza->name }}</h1>

        <p class="text-gray-700 mb-4">{{ $pizza->description }}</p>

        <p class="text-xl font-semibold text-green-700 mb-6">Prijs: €{{ $pizza->price }}</p>

        <div class="flex justify-start space-x-4">
            <a href="{{ route('pizzas.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
                Terug naar Menu
            </a>
        </div>
    </div>
</div>

    <div class="text-center mb-4 mt-4">
        <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition-colors">
                Delete Pizzas
            </button>
        </form>
    </div>


    <div class="flex justify-between mt-4">
        <a href="{{ route('pizzas.edit', ['pizza' => $pizza->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Edit Band
        </a>

        <a href="{{ route('pizzas.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
            Back to List
        </a>
    </div>
    </div>
</body>
</html>


