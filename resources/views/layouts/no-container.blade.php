<!-- The only way to do great work is to love what you do. - Steve Jobs -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss'])
    @stack("style")
</head>
<body>
@include('layouts.header')
@yield('bar')
    @yield("content")

    @vite(['resources/js/app.js'])
    @stack('page-scripts')
</body>
</html>
