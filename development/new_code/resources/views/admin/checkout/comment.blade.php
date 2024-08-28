@extends('layout.admin-layout')

@section('content')
    <div class="max-w-screen-lg mx-auto">
        <div class="flex justify-between mb-4">
            <a href="{{ route('checkout.orders') }}" class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-24 justify-center">
                Terug
            </a>
        </div>
        <div class="mb-4">
            <form action="{{ route('orders.updateComment', ['orderId' => $orderLine->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="opmerking" class="block text-gray-700 text-sm font-bold mb-2">Opmerking toevoegen:</label>
                <textarea id="opmerking" name="opmerking" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $orderLine->comment ?? '' }}</textarea>

                @error('opmerking')
                <span class="text-red-500 mt-2">{{ $message }}</span>
                @enderror

                <label for="select-comment" class="block text-gray-700 text-sm font-bold mt-4 mb-2">Selecteer een bestaande opmerking:</label>
                <select id="select-comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">-- Selecteer een opmerking --</option>
                    @foreach($comments as $comment)
                        <option value="{{ $comment->comment }}">{{ $comment->comment }}</option>
                    @endforeach
                </select>

                <div class="mt-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full w-24">
                        Opslaan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('select-comment').addEventListener('change', function() {
            // Get the selected comment's value
            var selectedComment = this.value;

            // Set the textarea value to the selected comment
            document.getElementById('opmerking').value = selectedComment;
        });
    </script>

@endsection
