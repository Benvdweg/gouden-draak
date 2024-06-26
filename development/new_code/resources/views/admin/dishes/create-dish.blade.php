@extends('layout.admin-layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Voeg Nieuw Gerecht Toe</h1>
        <div class="bg-gray-100 p-6 rounded shadow-md mb-6">
            <form action="{{ route('admin.dishes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                    <input type="text" name="name" id="name"
                           class="form-input p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                           value="{{old('name')}}">
                    @error('name')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
                    <input type="text" name="price" id="price"
                           class="form-input p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                           value="{{old('price')}}">
                    @error('price')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                    <textarea name="description" id="description" class="form-textarea mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{old('description')}}</textarea>
                    @error('description')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" id="type"
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <option value="">Selecteer het type</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Opslaan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
