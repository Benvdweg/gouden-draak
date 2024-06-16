@extends('layout.layout')

@section('content')
    <div class="max-w-screen-lg mx-auto bg-gray-100 border-2 border-black rounded-b px-4 py-3 shadow-md mb-4 text-center">
        <h3 class="font-bold text-xl">{{ $latestNews->title }}</h3>
        <p class="text-sm overflow-hidden break-words">{!! nl2br(e($latestNews->message)) !!}</p>
        <p class="text-xs text-gray-500">{{ $latestNews->created_at->diffForHumans() }}</p>
    </div>
@endsection
