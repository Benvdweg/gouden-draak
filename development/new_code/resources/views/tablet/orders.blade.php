@extends('layout.tablet-layout')

@section('content')
    <div>
        <div class="justify-between flex">
            <a href="{{ route('tablet.index')}}"
               class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-48 justify-center mb-4">
                Naar Gerechten
            </a>

            <div>
                <span class="font-bold text-xl">Tafelnummer {{$reservation->table_number}}</span>
            </div>
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
                <div class="flex w-full justify-centerst">
                    <p class="text-center">Nog geen gerechten.</p>
                </div>
            @endforelse
        </div>

        @if(!empty($orders))
            <form method="POST" action="{{ route('orders.process') }}">
                @csrf
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4">
                    Bestelling Verzenden
                </button>
            </form>
        @endif
    </div>
@endsection
