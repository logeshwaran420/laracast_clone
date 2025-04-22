@props(["title","href","img"])
<a href="{{ $href }}" class="block">
<div class="bg-gray-800 text-gray-400 shadow-lg overflow-hidden p-4 transition duration-300 hover:bg-gray-600 hover:shadow-xl w-80 h-80 flex-shrink-0">
    <div class="text-center">
        <h3 class="text-xl font-semibold text-white">{{ $title }}</h3> <!-- Displays the title passed to the component -->
        <p class="text-gray-400 text-xs mt-1 px-2 py-1 font-bold">{{ $slot }}</p> <!-- Displays the content passed inside the component -->
    </div>
    <img src="{{ $img }}" alt="Course Image" class="w-full h-80 object-cover mt-3">
</div>

</a>