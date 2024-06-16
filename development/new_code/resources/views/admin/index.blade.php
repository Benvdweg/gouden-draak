@extends('layout.admin-layout')

@section('content')
    <div class="container mx-auto mt-4">
        @include('shared.success-message')
        <h1 class="text-3xl font-bold mb-6 text-center">Menu kaart beheren</h1>
        <div class="bg-white p-6 rounded shadow-md mb-6">
            <div class="mb-6 flex justify-end">
                <a href="{{ route('admin.dishes.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Gerecht Toevoegen
                </a>
            </div>
            <table class="w-full border-collapse">
                <thead>
                <tr>
                    <th class="border-b py-2 text-left">Naam</th>
                    <th class="border-b py-2 text-left">Prijs</th>
                    <th class="border-b py-2 text-left">Beschrijving</th>
                    <th class="border-b py-2 text-left">Menu Nummer</th>
                    <th class="border-b py-2 text-left">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td class="border-b py-2">{!! $dish->name !!}</td>
                        <td class="border-b py-2">{{ $dish->price }}</td>
                        <td class="border-b py-2 whitespace-nowrap overflow-hidden overflow-ellipsis max-w-xs">{{ $dish->description }}</td>
                        <td class="border-b py-2">
                            @if ($dish->menu_number)
                                {{ $dish->menu_number }}
                            @endif
                            @if ($dish->addition)
                                {{ $dish->addition->letter }}
                            @endif
                        </td>
                        <td class="border-b py-2">
                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                    Verwijderen
                                </button>
                            </form>
                            <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-700">
                                Bewerken
                            </a>
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
