<!doctype html>
<html>
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>The Golden Dragon</title>
    <style>
        body {
            background-color: darkred;
            margin: 15px;
            margin-left: 50px;
            margin-right: 50px
        }

        td {
            padding: 0px;
        }

        @font-face {
            font-family: 'chinese_takeawayregular';
            src: url('{{asset('fonts/chinesetakeaway-webfont.woff2')}}') format('woff2'),
            url('{{ asset('fonts/chinesetakeaway-webfont.woff') }}') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        a {
            text-decoration: none;
            color: yellow;
        }
    </style>
</head>

    <body>
        @yield('content')
    </body>
</html>
