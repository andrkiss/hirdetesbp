<x-app-layout>
    <x-haromresz>

        <x-slot name="bal">
            <x-kereso />
        </x-slot>

        <x-slot name="jobb">
            @if($ad->user->id !== auth()->user()->id)
            <x-hirdeto>
                <a class="hird" href="">{{ $ad->user->name }}</a>
            </x-hirdeto>
            @endif
        </x-slot>

        <div class="flex flex-col border border-1 rounded border-gray-100 mt-6 px-3 pt-3 pb-2 drop-shadow bg-neutral-100">
            {{-- foresz --}}
            <div class="flex-col">

                {{-- cim --}}
                <div class="text-lg text-white mt-2 bg-blue-900 p-2 pl-3 rounded">
                    {{ $ad->cim }}
                </div>

                    {{-- kep --}}
                    @if(file_exists('img/ad/' . $ad->id . '_large.jpg'))
                    <div class="mt-4">
                        <a href="/img/ad/{{ $ad->id }}_large.jpg" data-lightbox="/img/ad/{{ $ad->id }}_large.jpg" data-title="{{ $ad->cim }}">
                            <img class="w-40" src="/img/ad/{{ $ad->id }}_large.jpg" alt="thumb.jpg" />
                        </a>
                    </div>
                    @endif

                {{-- szovegresz --}}
                <div class="flex-col mt-6">

                    {{-- ar --}}
                    <p class="text-gray-600 text-lg font-medium">Ár: <span class="text-2xl font-bold">{{ $ad->ar }}</span> Ft</p>

                    {{-- szoveg --}}
                    <div class="max-w-xl">
                        <p class="mt-4 text-lg font-bold">Leírás</p>
                        <p>{{ $ad->szoveg }}</p>
                    </div>
                </div>
            </div>

            {{-- alulgomb --}}
            <div class="flex text-base font-bold space-x-3 mt-5">
                {{-- vissza --}}
                <a class="text-gray-700 hover:text-gray-600 focus:text-ray-700" href="{{ url()->previous() }}">
                    <i class="fa fa-circle-arrow-left"></i>
                </a>
                <div class="flex space-x-1">
                    @can('update', $ad)
                        <a class="text-gray-700 hover:text-gray-600 focus:text-gray-700" href="/ad/{{ $ad->id }}/edit"><i class="fas fa-edit"></i></a>
                    @endcan
                    @can('delete', $ad)
                    <form action="/ad/{{ $ad->id }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" value=""><i class="text-sm text-gray-700 hover:text-gray-600 focus:text-gray-700 fa fa-trash-can"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </x-haromresz>
</x-app-layout>

