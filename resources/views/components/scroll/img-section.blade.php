@props(["img","href","name","description"])
<a href="{{$href}}">
    <div class="w-80 h-80 relative shadow-md overflow-hidden">
        <img src="{{ $img }}" 
             alt="Course Image" 
             class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black/50 text-white flex flex-col justify-center items-center text-center px-4">
          <h3 class="text-lg font-semibold">{{$name}}</h3>
          <p class="text-sm mt-1 text-gray-200">{{ $description }}</p>
        </div>
      </div>
    </a>