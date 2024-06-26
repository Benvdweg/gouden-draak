@extends('layout.layout')

@section('content')
    <div>
        @include('shared.success-message')
        <div class="justify-between flex">
            <a href="{{ route('pick-up.menu-category-show')}}"
               class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-48 justify-center mb-4">
                Naar Gerechten
            </a>
        </div>
    </div>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($orders as $order)
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-center items-center">
                    <h5 class="text-xl font-semibold mb-2 text-center">Bestelling #{{ $loop->iteration }}</h5>
                    <ul class="text-sm text-gray-600 mb-4">
                        <li>Naam: {{ $order['name'] }}</li>
                        <li>Prijs: €{{ $order['price'] }}</li>
                    </ul>
                </div>
            @empty
                <div class="flex w-full justify-center ml-[500px]">
                    <p class="text-center">Nog geen gerechten.</p>
                </div>
            @endforelse
        </div>

        @if(!empty($orders))
            <div class="mt-8">
                <form action="{{route('pick-up-process-orders')}}" method="POST"
                      class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email"
                            name="email"
                            type="email">
                        @error('email')
                        <span class="text-red-500 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                            Bestelling Verzenden
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
