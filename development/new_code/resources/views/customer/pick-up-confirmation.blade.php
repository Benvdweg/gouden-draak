@extends('layout.layout')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <h1 class="text-2xl font-bold mb-4">Bestelling bevestigd</h1>
        <p class="mb-4">Uw bestelling (met bestelnummer #{{$orderId}}) is geplaatst.</p>
        <div class="mb-4">
            {!! $qrCode !!}
        </div>
        <p class="text-sm text-gray-600">Scan de QR code om meer details te zien over uw bestelling.</p>
        <a href="{{ route('pick-up.menu-category-show') }}"
           class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Terug naar afhalen
        </a>
    </div>
@endsection
