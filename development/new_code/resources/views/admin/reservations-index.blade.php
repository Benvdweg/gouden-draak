@extends('layout.admin-layout')

@section('content')
    @include('shared.success-message')

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Today's Reservations</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reservations as $reservation)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800">Reservation</h2>
                    <div class="mt-4">
                        <p class="text-gray-600">
                            <span class="font-semibold">Start Time:</span>
                            <span class="text-blue-500">{{ $reservation->starttime->format('F j, Y, g:i a') }}</span>
                        </p>
                        <p class="text-gray-600 mt-2">
                            <span class="font-semibold">End Time:</span>
                            <span class="text-red-500">{{ $reservation->endtime->format('F j, Y, g:i a') }}</span>
                        </p>
                        <form action="{{ route('reservations.assignTable', ['reservation' => $reservation->id]) }}" method="POST" class="mt-4">
                            @csrf
                            <label for="table_number" class="block font-semibold">Table Number:</label>
                            <input type="text" id="table_number" name="table_number" class="form-input mt-1 block w-full" placeholder="Enter table number" value="{{$reservation->table_number}}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 mt-2 rounded-md">Assign Table</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
