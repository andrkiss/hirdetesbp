<x-app-layout>
    <x-haromresz>
        <x-slot name="bal">
            <x-kereso />
        </x-slot>

        @if($hirdetesek->isEmpty())
        <div class="flex text-gray-500 font-normal text-lg pl-4 pt-5 pb-1">
            Még nincs feladott hirdetésed.
        </div>
        @else
        <div>
            {{-- fent --}}
            <div class="flex text-green-500 font-bold text-lg pl-2 pt-4 pb-1">
                Hirdetéseid
            </div>

            {{-- also --}}
            <div class="rounded-lg p-1 my-2 bg-neutral-50 border border-neutral-200 drop-shadow">
                {{-- lista --}}
                <div class="divide-neutral-300 divide-y divide-solid">
                    @foreach($hirdetesek as $hirdetes)
                    <div class="flex py-2">
                        {{-- kep --}}
                        @if (file_exists('img/ad/' . $hirdetes->id . '_thumb.jpg'))
                            <div class="flex-none pl-2"><img src="/img/ad/{{ $hirdetes->id }}_thumb.jpg" alt="thumb" /></div>
                        @endif
                        {{-- szoveg --}}
                        <div class="flex-col">
                            {{-- cim edit delete --}}
                            <div class="flex items-center space-x-3">
                                {{-- cim --}}
                                <div>
                                    <a class="cim text-lg font-normal ml-2" href="ad/{{ $hirdetes->id }}">{{ $hirdetes->cim }}</a>
                                </div>
                                {{-- edit delete --}}
                                <div class="flex items-center space-x-1">
                                    <a href="ad/{{ $hirdetes->id }}/edit"><i class="text-sm text-gray-500 hover:text-gray-400 fa fa-pen-to-square"></i></a>
                                    <form action="/ad/{{ $hirdetes->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" value=""><i class="text-sm text-gray-500 hover:text-gray-400 fa fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </div>
                            {{-- info --}}
                            <div class="text-xs ml-2 mt-0.5">
                                <div class="text-teal-800">
                                    <i class="fa fa-{{ $hirdetes->category()->ikon }}"></i>&nbsp;{{ $hirdetes->category()->nev }} | {{ $hirdetes->district()->szam }}. kerület
                                </div>
                                <p class="text-gray-400 mt-2">{{ $hirdetes->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- linkek --}}
            <div class="mt-2 p-2 pb-1">
                {{ $hirdetesek->links() }}
            </div>
        </div>
        @endif
    </x-haromresz>
</x-app-layout>
