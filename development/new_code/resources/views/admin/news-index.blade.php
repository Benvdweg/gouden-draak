@extends('layout.admin-layout')

@section('content')
    @include('shared.success-message')

    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded shadow-md w-full md:w-2/3 lg:w-1/2 mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Nieuws Bericht Plaatsen</h2>
            <form method="post" action="{{route('admin.news.store')}}">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Titel</label>
                    <input type="text" name="title" id="title"
                           class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:ring-indigo-300"
                           placeholder="Voer de titel in" value="{{old('title')}}">
                    @error('title')
                    <span class="text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Bericht</label>
                    <textarea name="message" id="message" cols="84" rows="5"
                              class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 resize-none"
                              placeholder="Schrijf je bericht hier">{!! old('message')!!}</textarea>
                    @error('message')
                    <span class="text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        Plaatsen
                    </button>
                </div>
            </form>
        </div>
        <div>
            <div class="bg-white p-8 rounded shadow-md w-full md:w-2/3 lg:w-1/2 mx-auto mt-8 mb-8">
                <h2 class="text-2xl font-semibold mb-6 text-center">Huidige Nieuws Bericht</h2>
                @if(isset($latestNews))
                    <div
                        class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md mb-4">
                        <h3 class="font-bold text-xl">{{ $latestNews->title }}</h3>
                        <p class="text-sm overflow-hidden break-words">{!! nl2br(e($latestNews->message)) !!}</p>
                        <p class="text-xs text-gray-500">{{ $latestNews->created_at->diffForHumans() }}</p>
                    </div>
                @else
                    <p class="text-center">Er zijn nog geen nieuws berichten</p>
                @endif
            </div>
        </div>

    </div>
@endsection
