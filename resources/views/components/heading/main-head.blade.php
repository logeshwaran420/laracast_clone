@props(["title"])

<div class="relative flex items-start justify-start mt-30 bg-cover bg-center px-10 pt-50">

    <div class="absolute inset-0 bg-gray-900 bg-opacity-90"></div>


    <div class="relative z-10 text-left max-w-2xl">
        <h1 class="text-5xl font-bold leading-tight text-blue-300 uppercase">
        {{ $title }}</h1>

        <p class="mt-6 text-lg text-white">
           {{ $slot }}
        </p>
    </div>
</div>
