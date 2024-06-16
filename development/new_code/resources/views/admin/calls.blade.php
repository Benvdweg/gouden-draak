@extends('layout.admin-layout')

@section('content')
    @include('shared.success-message')
    @include('shared.error-message')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Huidige meldingen</h1>

        @if($calls->isEmpty())
            <p class="text-gray-600">Er zijn momenteel geen meldingen.</p>
        @else
            <ul class="space-y-4">
                @foreach($calls as $call)
                    <li class="bg-white shadow-md rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <span class="font-semibold">Tafel {{ $call->table_number }}</span>
                            <span class="text-gray-600 ml-4">{{ $call->created_at->format('H:i') }}</span>
                        </div>
                        <form action="{{route('waiter.call.handle', ['waiterCall' => $call])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Afgehandeld
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <div class="mt-6 flex justify-center">
                {{ $calls->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
@endsection
