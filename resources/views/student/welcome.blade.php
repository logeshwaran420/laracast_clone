@extends('layout.student')
@section('content')

 <div class="bg-gray-900 text-white p-10">

    @php
    $firstCourse = $courses->first();
    $firstLesson = $firstCourse->lessons->first() ?? null;
@endphp

    <div class="relative flex items-start justify-start mt-30 bg-cover bg-center px-10 pt-50">

        <div class="absolute inset-0 bg-gray-900 bg-opacity-90"></div>
    
    
        <div class="relative z-10 text-left max-w-2xl">
            <h1 class="text-6xl font-extrabold leading-[1.3] text-white uppercase mt-8 mb-4">
                
It's <span class="text-blue-500">Dangerous</span>
 to Code Alone.

              </h1>
              {{-- <span class="text-blue-500">Watch This.</span> --}}
            <p class="mt-6 text-lg text-white">
                Equip yourself with our endless collection of Laravel and PHP courses, exams, and a community
                 that's second to none. Want to learn Laravel from the coding wizards who know it best?
            </p>

            <div class="mt-6 px-6"> 
                <div class="flex flex-wrap sm:flex-row gap-8 mx-auto">
                 
                   
                    @auth
                    <a href="{{ route('episode', [
                        'course' => $firstCourse->slug,
                        'lesson' => $firstLesson->position
                    ]) }}"
                    class="flex-1 text-center bg-gray-700 text-white
                     py-2 px-4 text-base font-semibold hover:bg-gray-600">
                        ▶ Start Watching
                    </a>
                    <a  class="flex-1 text-center  py-2 px-4 ">                    
                    </a>   
                    @endauth
                    @guest
                  <a href="{{ "/register" }}" class="flex-1 text-center bg-blue-600 text-white py-2 px-4 text-base font-semibold hover:bg-blue-500">
                        Sign Up
                    </a>
                    <a  class="flex-1 text-center  py-2 px-4 ">                    
                    </a>    
                    @endguest
                </div>
            </div>
            
            
        </div>

      
    </div>
 




    <x-scroll.scrollbar>

        @foreach ($instructors as $instructor)
        <a href="{{ route('instructor', ['instructor' => $instructor->user->id]) }}">
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
        :href="route('series', $course)"
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
                   :href="route('topics', ['categoryName' => $category->name]).'#courses'"
                        :name="$category->name" 
                        :course-count="$category->courses->count()" 
                        :video-count="$category->courses->sum(fn($course) => $course->lessons->count())"
                        :image="asset('storage/images/' . $category->image)"
                    />
                @endif
            @endforeach
        </div>
    </div>
            </div>
       
    
         </x-scroll.scrollbar>












         {{-- @auth
 
             <div class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">
                 <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12">
                     <!-- Left Image Section -->
                     <div class="flex-shrink-0">
                         <img src="{{ asset('storage/images/subs.png') }}" alt="Laracasts Characters" class="w-64 md:w-80">
                     </div>
     
                     <!-- Text Section -->
                     <div>
                         <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                             A massive community of <br class="hidden md:block" />
                             programmers just like you.
                         </h1>
                         <p class="text-lg text-gray-300 mb-4">
                             Think of Laracasts sort of like Netflix, but for developers. You could spend weeks binging,
                             and still not get through all the content we have to offer.
                         </p>
                         <p class="text-lg text-gray-300 mb-6">
                             Push your web development skills to the next level, through expert screencasts on PHP,
                             Laravel, Vue, and much more.
                         </p>
                         <a href="{{ route('subscribe') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                             Subscribe!
                         </a>
                     </div>
                 </div>
             </div>
         
     @endauth --}}
     

     @auth
     @if (!auth()->user()->subscriptions()->where('is_active', true)->exists())
     <x-subscription-prompt :user="auth()->id()" />
     @endif
 @endauth

 </div>
@endsection




