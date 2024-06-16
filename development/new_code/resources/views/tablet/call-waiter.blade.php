@extends('layout.tablet-layout')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-11/12">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
                Weet u zeker dat je de ober wilt roepen?
            </h2>
            <div class="flex justify-center space-x-4">
                <a class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300"
                   href="{{route('tablet.index')}}">
                    Nee, annuleer
                </a>
                <form method="post" action="{{route('tablet.store.call')}}">
                    @csrf
                    <button
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300" type="submit">
                        Ja, roep de ober
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
