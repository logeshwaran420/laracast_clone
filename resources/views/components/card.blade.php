@props(['name', 'courseCount', 'videoCount', 'image', 'href'])

<a href="{{ $href }}" class="block">
    <div class="bg-gray-800 hover:bg-gray-700 p-6 transition cursor-pointer flex items-center gap-4 text-capitalize">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-16 h-16 " />
        <div>
            <h3 class="text-xl font-semibold text-white">{{ $name }}</h3>
            <p class="text-gray-400 text-sm">
                {{ $courseCount }} Series &bull; {{ $videoCount }} Videos
            </p>
        </div>
    </div>
</a>
