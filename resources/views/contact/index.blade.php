<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stonkspizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<header class="bg-green-600 text-white p-4 flex justify-between items-center shadow-md">
    <div class="flex items-center">
        <img src="/images/image 4.png" alt="Stonkspizza Logo" class="h-16 w-auto mr-3">
        <h1 class="text-2xl font-extrabold tracking-wide">Stonkspizza</h1>
    </div>
    <nav class="space-x-6">
        <a href="{{route('home.index')}}" class="hover:underline hover:text-gray-200">Home</a>
        <a href="{{route('pizzas.menu')}}" class="hover:underline hover:text-gray-200">Menu</a>
        <a href="{{route('contact.index')}}" class="hover:underline hover:text-gray-200">Contact</a>
        <a href="/winkelmand" class="hover:underline hover:text-gray-200">Winkelmand</a>
    </nav>
</header>

<main class="p-6">
    <div class="mb-6">
        <img src="https://wijzerondernemen.nl/wp-content/uploads/2017/04/bedrijf.jpeg">
    </div>

    <div class="mx-auto max-w-lg p-6 bg-gray-200 border-2 border-blue-500 rounded-md text-center">
        <p class="text-xl font-bold">Contact informatie</p>
    </div>
</main>

</body>
</html>
