@extends('layout.checkout-layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">All Orders</h1>

        <div class="bg-white rounded shadow-md">
            <div class="flex items-center justify-between bg-gray-100 px-6 py-4">
                <div class="w-1/4 px-4">Ronde</div>
                <div class="w-1/4 px-4">Tafel</div>
                <div class="w-1/4 px-8">Besteld om</div>
            </div>

            <ul>
                @forelse($orders as $order)
                <a href="{{ route('checkout.orderLines', ['order' => $order->id]) }}" class="block hover:bg-gray-100">
                    <li class="border-b border-gray-200 py-4 flex items-center justify-between">
                        <div class="w-1/4 px-8">{{ $order->order_lines->first()->round_number }}</div>
                        <div class="w-1/4 px-8">Tafel {{ $order->reservation->table_number }}</div>
                        <div class="w-1/4 px-8">{{ date('H:i', strtotime($order->order_time)) }}</div>
                    </li>
                </a>
            @empty
                <li class="text-center text-gray-500 py-4">No orders found</li>
            @endforelse
            </ul>
        </div>
    </div>
@endsection
