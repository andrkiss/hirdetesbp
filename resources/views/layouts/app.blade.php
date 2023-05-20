<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? config('app.name', 'Hirdetés.bp') . ' | ' . $title : config('app.name', 'Hirdetés.bp') }}</title>
        <meta name="description" content="{{ isset($description) ? $description : 'Default description.' }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" href="{{ asset('img/logouj.ico')}}">

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-stone-100">
        {{-- <x-banner /> --}}

            @livewire('navigation-menu')

            {{-- nav alatt --}}
            <main>
                {{ $slot }}
            </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
