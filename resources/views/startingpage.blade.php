<x-app-layout>
    <x-haromresz>

        <x-slot name="bal">
            <x-kereso />
        </x-slot>

        @if(isset($adek) && isset($leguj))
        @foreach($adek as $ad)
            <div class="mt-1">{{ $ad->cim }}</div>
        @endforeach
        @endif
</x-haromresz>
</x-app-layout>
