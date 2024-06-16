@extends('layout.layout')

@section('content')
    @foreach($components as $component)
        @if($component instanceof \App\Models\TextComponent)
            <x-text-component :page="$page" :component="$component" :editing="$editing" :isView="$isView"/>
        @endif
    @endforeach
@endsection
