<x-app-layout>
    <x-haromresz>
        <div class="py-2 px-1">
            <form action="/ad/{{ $ad->id }}" autocomplete="off" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mx-0.5">
                    {{-- cim --}}
                    <label class="block mt-1 text-sm font-semibold" for="cim">Cím</label>
                    <input class="w-full appearance-none rounded" id="cim" name="cim" type="text" value="{{ old('cim') ?? $ad->cim }}">

                    {{-- szoveg --}}
                    <label class="block mt-4 text-sm font-semibold" for="szoveg">Szöveg</label>
                    <textarea class="w-full appearance-none rounded" id="szoveg" name="szoveg" rows="3">{{ old('szoveg') ?? $ad->szoveg }}</textarea>

                    {{-- hely kategoria ar --}}
                    <div class="flex space-x-5 mt-5">
                        {{-- hely --}}
                        <div>
                            <label class="block text-sm font-semibold" for="kerulet">Hirdetés helye</label>
                            <select class="appearance-none rounded text-sm" id="kerulet" name="kerulet">
                                @foreach ($Kerul as $kerul)
                                    <option value="{{ $kerul->id }}">
                                        {{ $kerul->szam }}. ker, {{ $kerul->nev }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- kategoria --}}
                        <div>
                            <label class="block text-sm font-semibold" for="kategoria">Kategória</label>
                            <select class="appearance-none rounded text-sm" id="kateoria" name="kategoria">
                                @foreach ($Kateg as $kateg)
                                    <option value="{{ $kateg->id }}">
                                        {{ $kateg->nev }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- keres/kínál --}}
                        <div>
                            <label class="block text-sm font-semibold" for="allapot">Keres/Kínál</label>
                            <select class="appearance-none rounded text-sm" id="allapot" name="allapot">
                                @foreach ($Allap as $allap)
                                    <option value="{{ $allap->id }}">
                                        {{ $allap->nev }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- ar --}}
                    <div class="flex mt-5">
                        <div>
                            <label class="block text-sm font-semibold" for="ar">Ár</label>
                            <input class="appearance-none rounded text-sm" id="ar" name="ar" type="text" value="{{ old('ar') ?? $ad->ar }}"> <span class="text-sm">Ft</span>
                        </div>
                    </div>

                    {{-- kep --}}
                    @if(file_exists('img/ad/' . $ad->id .'_large.jpg'))
                        <div class="flex space-x-2">
                            <div class="mt-5">
                                <img src="/img/ad/{{ $ad->id }}_thumb.jpg" alt="thumb.jpg" />
                            </div>
                        </div>
                    @endif

                    {{-- feltoltes --}}
                    <label class="block text-sm font-semibold mt-5 mb-0.5 {{ $errors->has('kep') ? 'border-danger' : '' }}" for="kep">Kép feltöltése</label>
                    <input class="appearance-none rounded text-base" type="file" id="kep" name="kep" value="">
                    <small>{!! $errors->first('kep') !!}</small>

                    {{-- ment vissza --}}
                    <div class="flex space-x-2 mt-6 items-center">
                        <input class="block bg-green-400 hover:bg-green-300 focus:bg-green-400 rounded cursor-pointer text-base text-white px-2 pb-0.5 font-semibold" type="submit" value="Ment">
                        <a class="text-white bg-blue-400 hover:bg-blue-300 focus:bg-blue-400 font-semibold px-2 pb-0.5 rounded" href="{{URL::route('ad.index')}}">
                            <span class="text-xs"><i class="fa fa-arrow-left"></i></span> Vissza
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </x-haromresz>
</x-applayout>
