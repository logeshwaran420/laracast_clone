@props(['title', 'description','playUrl'])

<div class="flex flex-col md:flex-row items-start gap-10">
    <div class="w-full md:w-2/3 text-left">
        <h1 class="text-4xl md:text-5xl  text-blue-300 font-extrabold leading-tight">
            {{ $title }}
        </h1>

        <p class="text-gray-300 mt-6 text-lg"> 
            {{ $description }}
        </p>

        <!-- Buttons -->
        <div class="mt-8 flex gap-4">
            <a href="{{ $playUrl }}"
                class="bg-blue-600 hover:bg-blue-500 px-6 py-3 text-lg font-semibold inline-block text-white ">
                 ▶ Play Series
             </a>
           
        </div>
    </div>

    <!-- Instructor Image -->
    <div class="w-full md:w-1/3 flex justify-center md:justify-end">
        {{ $slot }}
    </div>
</div>
