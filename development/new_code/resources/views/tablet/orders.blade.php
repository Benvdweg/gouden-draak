@extends('layout.tablet-layout')

@section('content')
    <div>
        <div class="justify-start flex">
            <a href="{{ route('tablet.index') }}"
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
                <p>Nog geen gerechten.</p>
            @endforelse
        </div>
    </div>
@endsection
