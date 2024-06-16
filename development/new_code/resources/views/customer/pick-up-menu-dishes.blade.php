@extends('layout.layout')

@section('content')
    <div class="justify-between flex">
        <a href="{{route('pick-up.menu-category-show')}}"
           class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-24 justify-center mb-4">
            Terug
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($dishes as $dish)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-center items-center">
                <h5 class="text-xl font-semibold mb-2 text-center">{{ $dish->name }}</h5>
                <p class="text-sm text-gray-600 mb-4 text-center">{{ $dish->description }}</p>
                <div class="flex items-center justify-center mb-4">
                    <span class="text-xl font-semibold text-gray-900">$ {{ $dish->price }}</span>
                </div>
                <div class="flex space-x-4">
                    <form action="{{route('pickup.order.add', ['dish' => $dish])}}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Toevoegen
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
