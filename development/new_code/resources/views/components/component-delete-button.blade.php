<form class="flex justify-end" action="{{route('component.destroy', ['page' => $page])}}" method="POST">
    @csrf
    @method("DELETE")
    <input type="hidden" value="{{$component->id}}" name="id">
    <button class="font-semibold text-2xl text-red-600">X</button>
</form>
