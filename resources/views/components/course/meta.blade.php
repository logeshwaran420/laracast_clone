@props(['tag', 'category', 'time', 'lesson'])

<div class="flex justify-between items-start mb-6">
    <div class="flex flex-wrap gap-3">
        <span class="border border-gray-700 text-gray-400 px-4 py-2 text-sm font-bold">
            {{ $tag }}
        </span>
        <span class="border border-gray-700 text-gray-400 px-4 py-2 text-sm font-bold">
            {{ $category }}
        </span>
        <span class="border border-gray-700 text-gray-400 px-4 py-2 text-sm font-bold">
            {{ $time }}
        </span>
        <span class="border border-gray-700 text-gray-400 px-4 py-2 text-sm font-bold">
            {{ $lesson }} Episodes
        </span>
    </div>

    <div class="flex flex-col items-end">
        <span class="border border-gray-700 text-gray-400 px-4 py-2 text-sm font-bold">
            Your Instructor — {{ $slot }}
        </span>
    </div>
</div>

          