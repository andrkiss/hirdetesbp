@props(['alertdoboz'])

@php
    $dobozclasses = [
        'info' => 'text-gray-900 text-base font-medium mt-4 pl-2 pt-2',
        'warning' => 'text-yellow-900 text-base font-medium mt-4 pl-2 pt-2',
        'danger' => 'text-red-900 text-base font-medium mt-4 pl-2 pt-2',
        'success' => 'text-green-900 text-base font-medium mt-4 pl-2 pt-2',
    ][$alertdoboz];
@endphp
    <a>
        <div {{ $attributes->merge(['class' => $dobozclasses]) }}>
            {{$slot}}
        </div>
    </a>
