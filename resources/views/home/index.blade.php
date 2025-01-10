<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stonkspizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Header -->
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

<!-- Content -->
<main class="p-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Our Best Deals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Template -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://www.dominos.nl/media/u5mbnuci/230061_www_aanbiedingspagina_750x500px_edd_v1-2.jpg"
                 alt="Pizza Deal" class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-red-500">HOT DEALS</p>
                <p class="text-xl font-bold text-gray-700">Every Day Discount</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://d3ed0bx5qudxt4.cloudfront.net/912024981" alt="Pizza Discount"
                 class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-green-600">50% off for every second pizza</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://cdn.create.vista.com/downloads/7ef1d95e-f641-4358-a1ed-4e5ae70ed593_640.jpeg"
                 alt="Pizza Fresh" class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-red-500">Hot & Fresh Pizza</p>
                <p class="text-sm text-gray-600">30% off all menu!</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://images.squarespace-cdn.com/content/v1/5a0348fed0e62853587b1d48/1688168142422-7P0L1QVLQL16YLUTUTZD/Final+Graphics-02.png?format=1000w"
                 alt="Pizza Fresh" class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-red-500">Fresh Pizza</p>
                <p class="text-sm text-gray-600">Large pizza for $10.99</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/weekend-special-pizza-discount-digital-displa-design-template-eead41e0be9ae608cac930fe51264bfe_screen.jpg?ts=1612977515"
                 alt="Pizza Fresh" class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-red-500">Weekend Specials</p>
                <p class="text-sm text-gray-600">30% off all menu!</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="https://media.licdn.com/dms/image/v2/D4E12AQFr1w6xXrSe3w/article-inline_image-shrink_1000_1488/article-inline_image-shrink_1000_1488/0/1667399732863?e=1741219200&v=beta&t=HgnefkfGMVHy1bO8LzwXMkNuCU_CvBVm5wxDzqQFvhg"
                 alt="Pizza Fresh" class="w-full h-64 object-cover">
            <div class="p-4 text-center">
                <p class="text-lg font-bold text-red-500">Hot & Fresh Pizza</p>
                <p class="text-sm text-gray-600">Limited Time Offer!</p>
            </div>
        </div>
    </div>
</main>

</body>
</html>
