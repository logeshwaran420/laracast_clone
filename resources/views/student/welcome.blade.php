@extends('layout.student')
@section('content')

 <div class="bg-gray-900 text-white p-10">

    @php
    $firstCourse = $courses->first();
    $firstLesson = $firstCourse ? $firstCourse->lessons->first() : null;
@endphp

    <div class="relative flex items-start justify-start mt-30 bg-cover bg-center px-10 pt-50">

        <div class="absolute inset-0 bg-gray-900 bg-opacity-90"></div>
    
    
        <div class="relative z-10 text-left max-w-2xl">
            <h1 class="text-6xl font-extrabold leading-[1.3] text-white uppercase mt-8 mb-4">
                
It's Dangerous to Code Alone.
<span class="text-blue-500">Watch This.</span>
              </h1>
    
            <p class="mt-6 text-lg text-white">
                Equip yourself with our endless collection of Laravel and PHP courses, exams, and a community
                 that's second to none. Want to learn Laravel from the coding wizards who know it best?
            </p>

            <div class="mt-6 px-6"> 
                <div class="flex flex-wrap sm:flex-row gap-8 max-w-md mx-auto">
                    @if ($firstCourse && $firstLesson)
                    <a href="{{ route('episode', [
                        'slug' => $firstCourse->slug,
                        'position' => $firstLesson->position
                    ]) }}"
                    class="flex-1 text-center bg-gray-700 text-white
                     py-2 px-4 text-base font-semibold hover:bg-gray-600">
                        ▶ Start Watching
                    </a>
                @endif
            
                    <a href="{{ "/register" }}" class="flex-1 text-center bg-blue-600 text-white py-2 px-4 text-base font-semibold hover:bg-blue-500">
                        Sign Up
                    </a>
                </div>
            </div>
            
            
        </div>

      
    </div>
 




    <x-scroll.scrollbar>

        @foreach ($instructors as $instructor)
        <a href="{{ route('instructor', ['id' => $instructor->user->id]) }}">
            <div class="w-80 h-80 relative shadow-md overflow-hidden rounded-lg">
                <img src="{{ asset('storage/instructors/' . $instructor->image) }}" 
                     alt="{{ $instructor->user->name }}" 
                     class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-black/50 text-white flex flex-col justify-center items-center text-center px-4">
                    <h3 class="text-lg font-semibold">{{ $instructor->user->name }}</h3>
                </div>
            </div>
        </a>
    @endforeach
      </x-scroll.scrollbar>




      <x-heading.sub-head>A Stream of Courses </x-heading.sub-head>
      <x-scroll.scrollbar>
                
        @foreach ($courses as $course)
        @php
        $instructor = $course->instructor;
        @endphp
        <x-scroll.section 
        :href="route('series', ['slug' => $course->slug])"
        :title="$course->title"
        
        img="{{ asset('storage/random_course/one.webp') }}"
    >
      {{ $instructor->name }} 
    </x-scroll.section>
   @endforeach
                 
             </x-scroll.scrollbar>
   
             

<x-heading.sub-head>
    Pick a Topic </x-heading.sub-head>
    
         <x-scroll.scrollbar>
    
    
    
    <div class="container mx-auto px-10 py-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                @if ($category->courses->count() > 0)
                    <x-card 
                   :href="route('topics', ['categoryName' => $category->name])"
                        :name="$category->name" 
                        :course-count="$category->courses->count()" 
                        :video-count="$category->courses->sum(fn($course) => $course->lessons->count())"
                        :image="asset('storage/images/' . $category->image)" 
                    />
                @endif
            @endforeach
        </div>
    </div>
       
    
         </x-scroll.scrollbar>
        
 </div>















@endsection