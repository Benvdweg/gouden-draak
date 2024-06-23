<!doctype html>
<html>
<html lang="nl">
<head>
    @vite('resources/css/admin-app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{asset('images/golden-key')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.api_key') }}/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    <title>De Gouden Admin</title>
    <script>
        tinymce.init({
            selector: "#tinyEditor",
        });
    </script>
</head>

<body class="h-screen overflow-hidden">
    <div class="flex h-full">
        @include('layout.admin-nav-bar')
        <div class="flex-1 overflow-y-auto">
            @yield('content')
        </div>
    </div>
    @yield("scripts")
</body>
</html>
