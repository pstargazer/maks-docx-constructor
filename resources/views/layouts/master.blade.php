<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <style> --}}
        <!-- @yield("style") -->
        {{-- </style> --}}
    </head>
    <body>
        @include('layouts.header')
        @yield('progressBar')
        <main class="container-my">
            @yield("content")
        </main>

        @vite(['resources/js/postload.js'])
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
        <!-- <script src="{{ asset('js/postload.js') }}" ></script> -->
        <!-- <script src="{{ asset('js/bootstrap.min.js') }}" ></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    </body>
    </html>
    