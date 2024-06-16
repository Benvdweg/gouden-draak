@extends('layout.tablet-layout')

@section('content')
    <div>
        <div class="justify-between flex">
            <a href="{{route('tablet.order_history')}}"
               class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-24 justify-center mb-4">
                Terug
            </a>
            <div>
                <a href="{{ route('tablet.favorites') }}"
                   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                    Favorieten
                </a>
            </div>

        </div>
    </div>

    <div class="flex justify-center mb-4">
        <form action="{{ route('tablet.addWhole') }}" method="POST">
            @csrf
            @foreach($orderLines as $orderLine)
                <input type="hidden" name="orderlines[]" value="{{ $orderLine->id }}">
            @endforeach
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-500">
                Hele bestelling toevoegen
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($orderLines as $orderLine)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-center items-center">
                <h5 class="text-xl font-semibold mb-2 text-center">{{ $orderLine->dish->name }}</h5>
                <p class="text-sm text-gray-600 mb-4 text-center">{{ $orderLine->dish->description }}</p>
                <div class="flex items-center justify-center mb-4">
                    <span class="text-xl font-semibold text-gray-900">$ {{ $orderLine->dish->price }}</span>
                </div>
                <div class="flex space-x-4">
                    <form action="{{ route('order.add', ['dish' => $orderLine->dish->id]) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Toevoegen
                        </button>
                    </form>
                    <form action="{{ route('tabletOrder.favorite', ['dish' => $orderLine->dish->id]) }}" method="POST">
                        @csrf

                        @php
                            $favorites = session()->get('favorites', []);
                            $inFavorites = in_array($orderLine->dish->id, $favorites);
                            $textColorClass = $inFavorites ? 'text-yellow-400' : 'text-white';
                        @endphp

                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500 {{ $textColorClass }}">
                            Favorieten
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
