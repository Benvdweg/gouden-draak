@extends('layout.admin-layout')

@section('content')
    <div class="p-6 flex items-center w-full flex-col">
        @include('shared.success-message')
        <h1 class="text-2xl font-bold mb-4">Pagina overzicht</h1>

        <div class="w-full max-w-md">
            <form action="{{ route('cms.store.page') }}" method="post"
                  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Titel</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                           placeholder="Titel">
                    @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">Pagina URL (slug)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('slug') border-red-500 @enderror"
                           placeholder="Pagina URL (slug)">
                    @error('slug')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Aanmaken
                    </button>
                </div>
            </form>
        </div>

        @if($pages->isEmpty())
            <p class="text-gray-600 mt-6">Er zijn geen pagina's gevonden.</p>
        @else
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($pages as $page)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64 h-32">
                        <div class="p-4 flex flex-col gap-2">
                            <h2 class="text-lg font-semibold mb-1 truncate"
                                title="{{ $page->title }}">{{ $page->title }}</h2>
                            <p>Aantal componenten: {{$page->getComponentCount()}}</p>
                            <div class="flex justify-between">
                                <form action="{{route('cms.destroy.page')}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" value="{{$page->id}}" name="page_id">
                                    <button type="submit" class="text-red-600 hover:underline">Verwijderen</button>
                                </form>
                                <div class="flex justify-end">
                                    <a href="{{route('cms.show.page', ['page' => $page])}}"
                                       class="text-blue-600 hover:underline">Bekijken</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
