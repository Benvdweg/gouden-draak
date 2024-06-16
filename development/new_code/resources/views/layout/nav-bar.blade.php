<div class="text-center flex items-center justify-between px-12 mb-8">
    <img src="{{asset('images/dragon-small.png')}}" alt="Dragon Head" class="w-64"/>
    <div>
        <h1 class="text-4xl text-yellow-400 font-bold">Chinees Indische Specialiteiten</h1>
        <h1 class="text-4xl text-yellow-400 font-bold">De Gouden Draak</h1>
        <div class="mt-8 flex justify-center border border-black p-0.5 space-x-1">
            <a href="#"
               class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">Menukaart</a>
            <a href="{{route('customer.news')}}"
               class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">Nieuws</a>
            <a href="{{ route('customer.contact') }}"
               class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">
                Contact
            </a>
        </div>
    </div>
    <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon Head" class="w-64"/>
</div>
<div class="mt-8 mb-8">
    <div class="flex flex-wrap justify-center gap-4">
        @foreach($pages as $page)
            <a href="{{ url($page->slug) }}"
               class="text-xl py-1 px-2 text-white bg-blue-500 hover:bg-blue-600 text-center font-bold border border-black w-32">
                {{$page->title}}
            </a>
        @endforeach
    </div>
</div>

