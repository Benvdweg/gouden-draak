@extends('layout.tablet-layout')

@section('content')
<div>
        <div class="justify-between flex">
            <a href="{{route('tablet.index')}}"
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
<div class="container mx-auto p-4">
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($orders as $order)
       
        <a href="{{ route('order.show', ['round_number' => $order->order_lines()->first()->round_number]) }}" class="block border rounded-lg p-4 shadow-md hover:bg-gray-100 transition-colors duration-300">

        @php
            $firstOrderLine = $order->order_lines->first();
        @endphp
           
            <h3 class="text-lg font-semibold mb-2">Ronde {{ $firstOrderLine->round_number }}</h3>
            
            <ul>
                @foreach ($order->order_lines as $line)
                <li class="mb-2">
                    <div class="flex justify-between">
                        <span>
                            {{ optional($line->dish)->name }}
                        </span>
                        <span>{{ $line->comment }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </a>
        @endforeach
    </div>
</div>
@endsection
