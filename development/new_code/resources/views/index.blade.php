@extends('layout.layout')

@section('content')
    <div class="bg-[#ff0000] p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <img src="{{asset('images/dragon-small.png')}}" alt="Dragon head" class="w-1/12 mr-4"/>
                <h1 class="text-yellow-400 text-3xl font-chinese_takeaway">De Gouden Draak</h1>
                <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon head flipped" class="w-1/12 ml-4"/>
            </div>
            

            <div class="flex items-center justify-end">
                <img src="{{asset('images/dragon-small.png')}}" alt="Dragon head" class="w-1/12 mr-4"/>
                <h1 class="text-yellow-400 text-3xl font-chinese_takeaway">De Gouden Draak</h1>
                <img src="{{asset('images/dragon-small-flipped.png')}}" alt="Dragon head flipped" class="w-1/12 ml-4"/>
            </div>
        </div>
    </div>
@endsection
