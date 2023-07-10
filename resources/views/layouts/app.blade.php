<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mi blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{-- <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    </script> --}}
    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('componentes.navbar')
        <main class="py-4">
            @yield('content')
            @isset($slot)
                {{$slot}}
            @endisset
        </main>
    </div>
    @livewireScripts
</body>
</html>
