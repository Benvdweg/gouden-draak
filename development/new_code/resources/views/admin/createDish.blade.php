@extends('layout.admin-layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Voeg Nieuw Gerecht Toe</h1>
        <div class="bg-white p-6 rounded shadow-md mb-6">
            <form action="{{ route('admin.dishes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
                    <input type="number" name="price" id="price" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                    <textarea name="description" id="description" class="form-textarea mt-1 block w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" id="type" class="form-select mt-1 block w-full" required>
                        <option value="">Selecteer het type</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
