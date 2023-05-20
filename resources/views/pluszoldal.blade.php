<x-app-layout>
    <x-haromresz>
        @foreach($proba as $kiirod)
        {{ $kiirod->district()->nev }}
        @endforeach
    </x-haromresz>
</x-app-layout>
