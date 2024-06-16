<x-component-control :page="$page" :component="$component"/>

@if($editing == $component->id)
    <form action="{{route('component.save.text', ['page' => $page])}}" method="POST">
        @csrf
        <div class="mt-8">
            <input type="hidden" value="{{$component->id}}" name="componentId">
            <textarea name="content" id="tinyEditor">
                {!! nl2br(e($component->content)) !!}
            </textarea>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 p-2 mt-6">
                    Opslaan
                </button>
            </div>
        </div>
    </form>
@else
    <div>
        <div class="prose max-w-full">
            {!! $component->content !!}
        </div>
        <div class="justify-end flex">
            <form action="{{route('component.edit.text', ['page' => $page])}}" method="POST">
                @csrf
                <input type="hidden" name="componentId" value="{{$component->id}}">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 p-2 mt-6">
                    Bewerken
                </button>
            </form>
        </div>
    </div>
@endif

