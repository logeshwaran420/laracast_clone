@props(['active' => false])

@php
$classes = ($active ?? false)
    ? 'text-white font-semibold'
    : 'text-gray-300 hover:text-white transition';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes . 'text-lg font-bold block px-4 py-2 hover: relative group uppercase ']) }}> 
        {{ $slot }}
    </a>
</li>
