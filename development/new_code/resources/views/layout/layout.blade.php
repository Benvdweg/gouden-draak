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

    @section('inside-frame')

        @include('layout.nav-bar')

        @yield('content')

        <div class="text-center mt-8">
            <a href="{{ route('customer.contact') }}" class="text-[#ffff00] font-times">
                Naar Contact
            </a>
        </div>

    @endsection
</div>

</body>
</html>
