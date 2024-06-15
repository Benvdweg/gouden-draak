<!doctype html>
<html>
<html lang="nl">
<head>
    @vite('resources/css/admin-app.css')
    @vite('resources/js/app.js')
    <title>De Gouden Kassière</title>
</head>

<body>
<div class="flex">
    @include('layout.checkout-nav-bar')
    @yield('content')
</div>
</body>
</html>
