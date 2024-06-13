@extends('layout.layout')

@section('content')
    <div class="bg-[#ff0000] p-8">

        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <img src="{{asset('images/dragon-small.png')}}" alt="Dragon head" class="w-1/12 mr-4"/>
                <h1 class="text-yellow-400 text-3xl font-chinese_takeaway">De Gouden Draak</h1>
                <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon head flipped"
                     class="w-1/12 ml-4"/>
            </div>


            <div class="flex items-center justify-end">
                <img src="{{asset('images/dragon-small.png')}}" alt="Dragon head" class="w-1/12 mr-4"/>
                <h1 class="text-yellow-400 text-3xl font-chinese_takeaway">De Gouden Draak</h1>
                <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon head flipped"
                     class="w-1/12 ml-4"/>
            </div>
        </div>

        <div class="border-4 border-yellow-400 p-4 mt-8">
            <div class="text-center flex items-center justify-between px-12 mb-16">
                <img src="{{asset('images/dragon-small.png')}}" alt="Dragon Head" class="w-64"/>
                <div>
                    <h1 class="text-4xl text-yellow-400 font-bold">Chinees Indische Specialiteiten</h1>
                    <h1 class="text-4xl text-yellow-400 font-bold">De Gouden Draak</h1>
                    <div class="mt-8 flex justify-center border border-black p-0.5 space-x-1">
                        <a href="#"
                           class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">Menukaart</a>
                        <a href="#"
                           class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">Nieuws</a>
                        <a href="#"
                           class="text-xl py-1 text-white bg-blue-500 hover:bg-blue-600 flex-1 text-center font-bold border border-black">Contact</a>
                    </div>

                </div>
                <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon Head" class="w-64"/>
            </div>


            <div class="bg-[#fffaf0] border border-black p-2">
                <h3 class="text-center">Al jaren is De Gouden Draak een begrip als het gaat om de beste afhaalgerechten
                    in
                    's-Hertogenbosch.<br>
                    Graag trakteren we u op authentieke gerechten uit de Cantonese keuken.</h3>

                {{--                Aanbieding implementatie--}}
            </div>

            <div class="text-center mt-8">
                <a href="#" class="text-yellow-400 text-2xl font-bold">
                    Naar Contact
                </a>
            </div>
        </div>
    </div>
@endsection
