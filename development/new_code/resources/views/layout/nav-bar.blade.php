<div class="text-center flex items-center justify-between">
    <img src="{{ asset('images/dragon-small.png') }}" alt="Dragon Head" class="w-52 mt-8 ml-2"/>
    <div>
        <h1 class="text-[40px] text-[#ffff00] font-bold font-times">Chinees Indische Specialiteiten</h1>
        <h1 class="text-5xl text-[#ffff00] font-bold font-times">De Gouden Draak</h1>
        <div
            class="mt-4 flex justify-center border border-t-[#808080] border-l-[#808080] border-r-[#2c2c2c] border-b-[#2c2c2c] p-0.5 space-x-1">
            <a href="{{ route('show.basic.menu') }}"
               class="text-lg text-white flex-1 text-center border border-t-[#2c2c2c] border-l-[#2c2c2c] border-r-[#808080] border-b-[#808080] bg-cover bg-no-repeat bg-menu-gradient font-times">Menukaart</a>
            <a href="{{ route('customer.news') }}"
               class="text-lg  text-white flex-1 text-center border border-t-[#2c2c2c] border-l-[#2c2c2c] border-r-[#808080] border-b-[#808080] bg-cover bg-no-repeat bg-menu-gradient font-times">Nieuws</a>
            <a href="{{ route('customer.contact') }}"
               class="text-lg text-white flex-1 text-center border border-t-[#2c2c2c] border-l-[#2c2c2c] border-r-[#808080] border-b-[#808080] bg-cover bg-no-repeat bg-menu-gradient font-times">Contact</a>
            <a href="{{ route('pick-up.menu-category-show') }}"
               class="text-lg text-white flex-1 text-center border border-t-[#2c2c2c] border-l-[#2c2c2c] border-r-[#808080] border-b-[#808080] bg-cover bg-no-repeat bg-menu-gradient font-times">Afhalen</a>
        </div>
    </div>
    <img src="{{ asset('images/dragon-small-flipped.png') }}" alt="Dragon Head" class="w-52 mt-8 mr-2"/>
</div>
<div class="mb-8">
    @if(!$pages->isEmpty())
        <div class="flex justify-center">
            <div
                class="mt-2 flex justify-center border border-t-[#808080] border-l-[#808080] border-r-[#2c2c2c] border-b-[#2c2c2c] p-0.5 space-x-1">
                @foreach($pages as $page)
                    <a href="{{ url($page->slug) }}"
                       class="text-lg text-white flex-1 text-center border border-t-[#2c2c2c] border-l-[#2c2c2c] border-r-[#808080] border-b-[#808080] bg-cover bg-no-repeat bg-menu-gradient font-times truncate max-w-fit px-4">
                        {{ $page->title }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
