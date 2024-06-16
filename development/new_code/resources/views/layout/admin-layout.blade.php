<!doctype html>
<html>
<html lang="nl">
<head>
    @vite('resources/css/admin-app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{asset('images/golden-key')}}">
    <title>De Gouden Admin</title>
</head>

<body>
<div class="flex">
    @include('layout.admin-nav-bar')
    @yield('content')
    @yield("scripts")
</div>
</body>
</html>
