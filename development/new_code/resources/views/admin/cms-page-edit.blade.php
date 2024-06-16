@extends('layout.admin-layout')

@section('content')
    <div class="flex flex-col w-full">
        {{$page->title}}

        @foreach($components as $component)
            @if($component instanceof \App\Models\TextComponent)
                <div class="bg-gray-300 p-4 m-4 rounded-lg">
                    <x-text-component :page="$page" :component="$component" :editing="$editing"/>
                </div>
            @endif
        @endforeach

        <div class="m-12 relative">
            <form id="component-form" action="{{route('component.store', ['page' => $page])}}" method="POST">
                @csrf
                <input type="hidden" name="type" id="component-type">
                <select id="component-dropdown"
                        class="form-select appearance-none border border-gray-300 rounded-md py-2 pl-3 pr-10 sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150">
                    <option value="" class="bg-gray-100">Voeg een component toe</option>
                    @foreach($componentTypes as $type => $info)
                        <option value="{{ $type }}" class="py-2 pl-3 pr-9">+ {{ $info["title"] }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        document.getElementById('component-dropdown').addEventListener('change', function () {
            const componentType = this.value;
            if (componentType) {
                document.getElementById('component-type').value = componentType;
                document.getElementById('component-form').submit();
            }
        });
    </script>
@endsection
