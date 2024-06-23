@extends('layout.admin-layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Checkout Page</h1>
        <form method="GET" action="{{ route('checkout') }}" class="bg-white p-6 rounded shadow-md mb-6">
            <div class="mb-4">
                <input
                    type="text"
                    name="search"
                    placeholder="Search by name or number"
                    value="{{ request('search') }}"
                    class="w-full p-2 border border-gray-300 rounded"
                >
            </div>
            <div class="mb-4">
                <select name="category" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </div>
        </form>

        <ul class="bg-white p-6 rounded shadow-md">
            @forelse($dishes as $dish)
                <li class="border-b border-gray-200 py-2">
                    <span class="font-bold">{{ $dish->id }}</span> -
                    <span class="text-green-600 font-bold">${{ $dish->price }}</span> -
                    <span class="font-semibold">{{ $dish->name }}</span>
                    <span class="text-gray-500">({{ $dish->description }})</span>
                </li>
            @empty
                <li class="text-center text-gray-500">No dishes found</li>
            @endforelse
        </ul>
    </div>

@endsection
