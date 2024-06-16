@extends('layout.admin-layout')

@section('content')
    @include('shared.success-message')

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Reserveringen van vandaag</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reservations as $reservation)
                <div class="bg-gray-100 shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800">Reservering</h2>
                    <div class="mt-4">
                        <p class="text-gray-600">
                            <span class="font-semibold">Starttijd:</span>
                            <span class="text-blue-500">{{ $reservation->starttime->translatedFormat('F j, Y, g:i') }}</span>
                        </p>
                        <p class="text-gray-600 mt-2">
                            <span class="font-semibold">Eindtijd:</span>
                            <span class="text-red-500">{{ $reservation->endtime->translatedFormat('F j, Y, g:i') }}</span>
                        </p>
                        <form action="{{ route('reservations.assignTable', ['reservation' => $reservation->id]) }}" method="POST" class="mt-4">
                            @csrf
                            <label for="table_number" class="block font-semibold">Tafelnummer:</label>
                            <input type="text" id="table_number" name="table_number" class="form-input p-2 mt-1 block w-full rounded-l" placeholder="Enter table number" value="{{$reservation->table_number}}">
                            @error('table_number')
                            <span class="text-red-500 mt-2">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 mt-2 rounded-md">Tafel toewijzen</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
