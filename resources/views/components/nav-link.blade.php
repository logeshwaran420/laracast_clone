@props(['active' => false])


@php
$classes = ($active ?? false)
    ? 'text-white font-semibold' 
    : 'text-gray-300 hover:text-white transition';
@endphp


<li>
<a {{ $attributes->merge(['class' => $classes . ' relative group uppercase text-sm font-semibold inline-block']) }}>
    {{ $slot }}


    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-gradient-to-r from-red-500 
    to-yellow-500 transition-transform duration-300 {{ $active ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
</a>
</li>