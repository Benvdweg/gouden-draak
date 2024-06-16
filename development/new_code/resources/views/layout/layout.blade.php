<!doctype html>
<html>
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{asset('images/golden-dragon.jpg')}}">
    <title>De Gouden Draak</title>
</head>
<body>
<div>
    @extends('layout.content-frame')

    <div class="flex items-center justify-between mb-4">
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

    @section('inside-frame')

        @include('layout.nav-bar')

        @yield('content')

        <div class="text-center mt-8">
                <a href="{{ route('customer.contact') }}" class="text-yellow-400 text-2xl font-bold">
                    Naar Contact
                </a>
            </div>

    @endsection
</div>

</body>
</html>
