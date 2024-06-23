@extends('layout.admin-layout')

@section('content')
<div class="max-w-screen-lg mx-auto">
    <div class="flex justify-between mb-4">
        <a href="{{ route('checkout.orders') }}"
           class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-24 justify-center">
            Terug
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($order->order_lines as $orderLine)
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-center items-center">
            <h5 class="text-xl font-semibold mb-2 text-center">{{ $orderLine->dish->name }}</h5>
            <p class="text-sm text-gray-600 mb-4 text-center">{{ $orderLine->dish->description }}</p>
            <div class="flex items-center justify-center mb-4">
                <span class="text-xl font-semibold text-gray-900">$ {{ $orderLine->dish->price }}</span>
            </div>
            <div class="flex space-x-4">
            <a href="{{ route('checkout.comment', ['orderLine' => $orderLine]) }}"
            class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                Opmerking toevoegen
            </a>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
