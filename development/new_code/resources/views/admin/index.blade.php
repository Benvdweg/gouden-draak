<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Gerechten Beheren</h1>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white p-6 rounded shadow-md mb-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2 text-left">Naam</th>
                        <th class="border-b py-2 text-left">Prijs</th>
                        <th class="border-b py-2 text-left pl-24">Beschrijving</th>
                        <th class="border-b py-2 text-left">Categorie</th>
                        <th class="border-b py-2 text-left">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td class="border-b py-2">{{ $dish->name }}</td>
                            <td class="border-b py-2">{{ $dish->price }}</td>
                            <td class="border-b py-2 pl-24">{{ $dish->description }}</td>
                            <td class="border-b py-2">{{ $dish->type->name ?? 'Geen categorie' }}</td>
                            <td class="border-b py-2">
                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                        Verwijder
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
