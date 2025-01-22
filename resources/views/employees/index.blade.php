<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-green-600 text-white p-4 flex justify-between items-center shadow-md">
    <h1 class="text-2xl font-extrabold tracking-wide">Employees Management</h1>
    <nav>
        <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-400 transition-colors">Add Employee</a>
        <div class="mt-6 text-center">
            <a href="{{ route('pizzas.index') }}" class="text-indigo-600 hover:underline">Back to pizza store</a>
        </div>
    </nav>
</header>

<main class="p-6">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-xl font-bold mb-4">Employees List</h2>
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 p-2 text-left">Name</th>
                <th class="border border-gray-300 p-2 text-left">Email</th>
                <th class="border border-gray-300 p-2 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 p-2">{{ $employee->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $employee->email }}</td>
                    <td class="border border-gray-300 p-2 space-x-2">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-400">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-400" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
