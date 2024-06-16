<!doctype html>
<html>
<html lang="nl">
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{asset('images/golden-dragon.jpg')}}">
    <title>De Gouden Tablet</title>
</head>

<body>
<div>
    @extends('layout.content-frame')

    @section('inside-frame')
        @yield('content')
    @endsection

</div>
</body>
</html>
