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
        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Log in voor Admin </a>
        <a href="{{route('home.index')}}" class="hover:underline hover:text-gray-200">Home</a>
        <a href="{{route('pizzas.index')}}" class="hover:underline hover:text-gray-200">Menu</a>
        <a href="{{route('contact.index')}}" class="hover:underline hover:text-gray-200">Contact</a>
        <a href="/winkelmand" class="hover:underline hover:text-gray-200">Winkelmand</a>
    </nav>
</header>

<main class="p-6">
    <!-- Afbeelding -->
    <div class="mb-6 flex justify-center">
        <img src="https://wijzerondernemen.nl/wp-content/uploads/2017/04/bedrijf.jpeg" alt="Restaurant"
             class="w-full max-w-md h-auto rounded-md shadow-md">
    </div>

    <!-- Contactinformatie -->
    <div class="mx-auto max-w-lg p-6 bg-gray-200 border-2 border-blue-500 rounded-md text-left">
        <h2 class="text-2xl font-bold text-center mb-4">Contactinformatie</h2>

        <p class="mb-4">
            <strong>Gegevens hoofdkantoor</strong><br>
            Postadres: Servicekantoor Stonkspizza's Nederland<br>
            Postbus 3, 3430 AA Nieuwegein
        </p>

        <p class="mb-4">
            <strong>Bezoekadres:</strong><br>
            Defensiedok 4,<br>
            3433 KL Nieuwegein<br>
            Telefoon: 088 629 0100 (bereikbaar maandag tot en met vrijdag van 08:30 tot 17:00 uur)
        </p>

        <p class="mb-4">
            <strong>KvK-nummer:</strong> 18048127<br>
            <strong>BTW-nummer:</strong> NL800589385B01
        </p>
    </div>
</main>

</body>
</html>
