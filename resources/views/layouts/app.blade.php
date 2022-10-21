<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon_io/site.webmanifest')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js', "resources/js/scripts.js"])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">
    {{--
    <x-jet-banner /> --}}
    <!-- strat wrapper -->

    @livewire('navigation-menu')
    <div class="h-screen flex flex-row flex-wrap">
        @include('layouts.menu.sidebar')

        <!-- strat content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            @if (isset($header))
            <header class=" shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            {{ $slot }}


        </div>
    </div>


    @stack('modals')

    @livewireScripts
</body>

</html>
