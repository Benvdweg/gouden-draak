@extends('layout.layout')

@section('content')
    <div class="text-center mt-8">
        <p class="text-lg mb-4">
            Dit menu kan out-of-date zijn!
            <a href="{{ route('download.pdf') }}" class="text-blue-500 hover:text-blue-600 font-bold">
                Download het huidige menu als PDF
            </a>
        </p>
        <img src="{{ asset('paginas/menukaarten/restaurant-menukaart-1-2.jpg') }}" alt="Menu kaart" class="max-w-full h-auto mx-auto">
    </div>
@endsection
