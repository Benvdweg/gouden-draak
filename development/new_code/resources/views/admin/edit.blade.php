@extends('layout.admin-layout')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Update Gerecht</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow-md mb-6">
            <form action="{{ route('admin.dishes.update', $dish->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                    <input type="text" name="name" id="name" value="{{ $dish->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
                    <input type="number" name="price" id="price" value="{{ $dish->price }}" step="0.01" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $dish->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="menu_number" class="block text-sm font-medium text-gray-700">Menu Nummer</label>
                    <input type="number" name="menu_number" id="menu_number" value="{{ $dish->menu_number }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="toevoeging" class="block text-sm font-medium text-gray-700">Toevoeging</label>
                    <input type="text" name="toevoeging" id="toevoeging" value="{{ $dish->addition }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </form>
        </div>
    </div>
@endsection
