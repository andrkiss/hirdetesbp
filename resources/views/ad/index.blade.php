<x-app-layout>
    <x-haromresz>

        <x-slot name="bal">
            <x-kereso />
        </x-slot>


        {{-- lista felett --}}
        <div class="text-green-500 flex space-x-3 items-center pl-2 pt-4 pb-1">
        {{-- ha van beirt, kereses --}}
        @if(isset($kateg) || isset($kerul) || isset($allap) || isset($beirt))
            @if(isset($kateg))
                <p class="text-lg font-bold"><i class="fa fa-{{ $kateg->ikon }}"></i>&nbsp;{{ $kateg->nev }}</p>
            @endif
            @if(isset($kerul))
                <p class="text-lg font-bold">{{ $kerul->szam }}. kerület</p>
            @endif
            @if(isset($allap))
                <p class="text-lg font-bold">{{ $allap->nev }}</p>
            @endif
            @if(isset($beirt))
                <p class="text-lg font-bold">{{ $beirt }}</p>
            @endif
        {{-- nincs beirt --}}
        @else
            @if(isset($legfriss))
                <p class="text-lg font-bold">Legfrissebb hirdetések</p>
            @else
                <p class="text-lg font-bold">Hirdetések</p>
            @endif
        @endif
        </div>

        {{-- lista --}}
        <ul>
            {{-- elemek --}}
            @foreach($adek as $ad)
                <li class="flex border border-stone-300 bg-white rounded my-2 p-2 drop-shadow-sm">
                    <div class="flex justify-between">
                        {{-- kep --}}
                        @if(file_exists('img/ad/' . $ad->id . '_thumb.jpg'))
                            <a class="mr-3" href="/ad/{{ $ad->id }}">
                                <img src="/img/ad/{{ $ad->id }}_thumb.jpg" alt="Ad Thumb">
                            </a>
                        @endif

                        {{-- szoveg --}}
                        <div class="flex-row">
                            {{-- cim edit --}}
                            <div class="flex space-x-3 items-center">
                                <a class="cim text-lg font-medium" href="/ad/{{ $ad->id }}">{{ $ad->cim }}</a>
                            </div>
                            {{-- ar --}}
                            <div class="flex">
                                <p class="text-red-600"><span class="text-lg font-bold">{{ $ad->ar }}</span> Ft</p>
                            </div>
                            {{-- info --}}
                            <div class="mt-3">
                                <p class="text-xs text-gray-400">{{ $ad->created_at->diffForHumans() }} | {{ $ad->state()->nev }} | {{ $ad->district()->szam }}. kerület</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{-- alul --}}
        <div class="px-1 pt-2 pb-1">
            {{ $adek->links() }}
        </div>

    </x-haromresz>
</x-app-layout>
