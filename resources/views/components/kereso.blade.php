<div class="flex justify-center mt-6">
    <div class="text-base border border-gray-300 bg-green-100 rounded drop-shadow p-3">
        <div>
            <form action="{{ route('kereso') }}" method="get" autocomplete="off" enctype="multipart/form-data">
                @csrf
                {{-- Kategoria --}}
                <div>
                    <label class="block font-medium text-base" for="kategoria">Kategória</label>
                    <select class="appearance-none rounded text-xs" id="kategoria" name="kategoria">
                        <option value="">Összes</option>
                        @foreach ($KategK as $kateg)
                            <option value="{{ $kateg->id }}">{{ $kateg->nev }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Kerulet --}}
                <div class="mt-3">
                    <label class="block font-medium text-base" for="kerulet">Kerület</label>
                    <select class="appearance-none rounded text-xs" id="kerulet" name="kerulet">
                        <option value="">Összes</option>
                        @foreach ($KerulK as $kerul)
                            <option value="{{ $kerul->id }}">{{ $kerul->szam }}. ker, {{ $kerul->nev }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Új/Használt --}}
                <div class="mt-3">
                    <label class="block font-medium text-base" for="allapot">Keres/Kínál</label>
                    <select class="appearance-none rounded text-xs" id="allapot" name="allapot">
                        <option value="">Mindegy</option>
                        @foreach ($AllapK as $allap)
                            <option value="{{ $allap->id }}">{{ $allap->nev }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Kulcsszo --}}
                <div class="mt-4">
                    <label class="block font-medium text-base" for="beirt">Kulcsszó</label>
                    <input class="appearance-none rounded text-xs" type="text" name="beirt" id="beirt" value="">
                </div>
                {{-- kereses gomb --}}
                <input class="block mt-4 bg-green-400 hover:bg-green-300 focus:bg-green-400 rounded cursor-pointer text-base text-white px-2 pb-0.5 font-semibold" type="submit" value="Keresés">
            </form>
        </div>
    </div>
</div>
