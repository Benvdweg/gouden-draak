@extends('layout.admin-layout')

@section('content')
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
                    <th class="border-b py-2 text-left">Beschrijving</th>
                    <th class="border-b py-2 text-left">Categorie</th>
                    <th class="border-b py-2 text-left">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td class="border-b py-2">{{ $dish->name }}</td>
                        <td class="border-b py-2">{{ $dish->price }}</td>
                        <td class="border-b py-2 pl-4">{{ $dish->description }}</td>
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
        <div class="mt-6 flex justify-center">
            {{ $dishes->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
