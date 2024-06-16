@extends('layout.layout')

@section('content')
    <div class="bg-white text-gray-800 p-8">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Ons Menu</h1>

            @foreach($dishTypes as $dishType)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-gray-300 pb-2 mb-4">{{ $dishType->type }}</h2>

                    @foreach($dishType->dishes as $dish)
                        <div class="mb-4">
                            <div class="flex justify-between items-baseline">
                            <span class="text-lg font-medium">
                                <span class="text-gray-600">{{ $dish->menu_number }}</span>
                                @if($dish->addition_id)
                                    <span class="text-sm text-gray-500">({{ $dish->addition->name }})</span>
                                @endif
                                {{ $dish->name }}
                            </span>
                                <span class="text-lg font-semibold text-gray-700">€{{ number_format($dish->price, 2) }}</span>
                            </div>
                            <p class="text-gray-600 mt-1">{{ $dish->description }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
