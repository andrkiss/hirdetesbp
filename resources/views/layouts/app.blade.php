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

            {{-- linkek --}}
            <div class="flex justify-center space-x-11 p-1">
                @foreach($KategN as $kateg)
                <x-nav-link href="/ad/kategoria/{{ $kateg->id }}" class="text-lg">
                    <div class="flex space-x-1 items-center">
                            <i class="text-xl mb-0.5 text-center fa fa-{{ $kateg->ikon }}"></i>
                            <b class="text-sm">{{ $kateg->nev }}</b>
                    </div>
                </x-nav-link>
                @endforeach
            </div>

            {{-- nav alatt --}}
            <main>
                {{ $slot }}
            </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>
