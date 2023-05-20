<div>
    @foreach ($alerts as $alert=>$szin)
    @if(session()->has($alert))
        <x-alert alertdoboz="{{ $alert }}" role="alert">{!! session($alert) !!}</x-alert>
    @endif
    @endforeach

    @if($errors->any())
    <div class="bg-red-100 border border-1 border-red-200 text-red-900 text-sm p-3 mt-7" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
