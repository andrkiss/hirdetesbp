<div class="flex flex-col h-screen justify-between">
    <div class="grid grid-cols-9 bg-stone-100">
        <div class="col-span-2">
        @if(isset($bal))
            {{ $bal }}
        @endif
        </div>
        <div class="col-span-5">
            {{-- uzenetek --}}
            @foreach ($alerts as $alert=>$szin)
            @if(session()->has($alert))
                <x-alert alertdoboz="{{ $alert }}" role="alert">{!! session($alert) !!}</x-alert>
            @endif
            @endforeach
            {{-- hiba --}}
            @if($errors->any())
            <div class="bg-red-100 border border-1 border-red-200 text-red-900 text-sm font-medium p-3 py-2 mt-7 mx-1 drop-shadow" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{ $slot }}
        </div>
        <div class="col-span-2">
        @if(isset($jobb))
            {{ $jobb }}
        @endif
        </div>
    </div>
    <div>
        <x-impresszum />
    </div>
</div>
