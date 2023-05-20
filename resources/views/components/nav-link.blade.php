@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-baseline py-1 text-sm font-medium leading-5 text-orange-500 hover:text-orange-400 focus:outline-none transition'
            : 'inline-flex items-baseline py-1 text-sm font-medium leading-5 text-gray-700 hover:text-gray-600 focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
