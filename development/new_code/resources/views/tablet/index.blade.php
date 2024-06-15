@extends('layout.tablet-layout')

@section('content')
    @include('shared.success-message')
    @include('shared.error-message')
    <div>
        <div class="justify-between flex">
            <a href="{{ route('orders.index')}}"
               class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 p-2 rounded-full w-56 justify-center mb-4">
                Naar Winkelwagen
            </a>

            <div>
                <span class="font-bold text-xl">Tafelnummer {{$reservation->table_number}}</span>
                <a href="{{ route('tablet.favorites') }}"
                   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                    Favorieten
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <a href="{{route('tablet.category', ['dishtype' => $category->id])}}">
                    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-center items-center">
                        <h5 class="text-xl font-semibold mb-2 text-cener">
                            {{$category->type}}
                        </h5>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
