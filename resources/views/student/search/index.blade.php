@extends('layout.student')
@section('content')

    <div class="container mx-auto px-10 py-4">
        <div class="flex flex-col lg:flex-row gap-10 mt-6">
            
          <!-- Left Side: Search Form + Filters -->
<div class="lg:w-1/4 w-full">
    <form action="{{ route('search') }}" method="GET" class="relative mb-6">
        <input 
            type="text" 
            name="q" 
            placeholder="Search..." 
            value="{{ request('q') }}" 
            class="w-full px-10 py-3 rounded bg-gray-700 text-sm placeholder:text-gray-400 text-white
                   focus:outline-none focus:ring-0 focus:border-transparent"
        />
        
        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
            </svg>
        </div>
    </form>

    
    <div class= 'mb-3 '>
        <h3 class="text-white text-sm font-semibold mb-2">CATEGORIES</h3>       
        <ul class="flex flex-wrap gap-2 mt-3">
            @foreach ($categories as $category)
                @php
                   $isActive = request()->query('q') === $category->name;
                    $classes = $isActive
                        ? 'text-white bg-blue-500'
                        : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                @endphp
                <li>
                    <a href="{{ route('search', ['q' => $category->name]) }}"
                       class="text-xs {{ $classes }} px-3 py-1 rounded">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        
    </div>

    <div>
        <h3 class="text-white text-sm font-semibold mb-2">INSTRUCTOR</h3>       
        <ul class="flex flex-wrap gap-2 mt-3">
            @foreach ($instructor as $instrucor)
                @php
                   $isActive = request()->query('q') === $instrucor->name;
                    $classes = $isActive
                        ? 'text-white bg-blue-500'
                        : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                @endphp
                <li>
                    <a href="{{ route('search', ['q' => $instrucor->name]) }}"
                       class="text-xs {{ $classes }} px-3 py-1 rounded">
                        {{ $instrucor->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        
    </div>








    
</div>

            <!-- Right Side: Course Grid -->
            <div class="lg:w-3/4 w-full">
                @php
                    $activeCourses = $courses->where('status','1');
                @endphp

                
                <p class="text-blue-300 font-bold px-5 py-6">Showing {{ $activeCourses->count() }} results </p>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-10">
                    @foreach ($activeCourses as $course)
                        <x-scroll.section 
                            :href="route('series', $course->slug)" 
                            :title="$course->title"
                            img="{{ asset('storage/random_course/three.webp') }}"
                            >{{ $course->instructor->name }}
                        </x-scroll.section>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
    
    
@endsection