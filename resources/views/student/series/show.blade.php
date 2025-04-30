@extends('layout.student')
@section('content')

 
    <section class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 px-6 py-12  bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto flex flex-col lg:flex-row items-start gap-12">

     

            <div class="flex-shrink-0 text-center w-full lg:w-1/4">
           
                <img 
            src="{{ asset('storage/instructors/'.$instructor->image ) }}" 
    class="w-[300px] h-[350px] object-cover shadow-lg mx-auto" 
            alt="{{ $course->instructor->name }}" 
        />
        <a href="{{ route('instructor',$instructor) }}" class="mt-4 bg-gray-700 text-white px-4 py-2 font-semibold w-full hover:bg-gray-600">More Series From Me</a>
        
                <div class="bg-gray-800  p-6 mt-6 text-left">
                  <h2 class="text-2xl font-bold text-blue-300">{{ $instructors->name }}</h2>
                  <p class="mt-4 text-sm text-gray-300">{{ $instructor->description}}</p>
                
                </div>
              </div>
        
              <div class="flex-1 max-w-2xl">
              <h1 class="text-5xl font-extrabold text-blue-300 mb-4">{{ $course->title }}</h1>
                <p class="text-lg leading-relaxed mb-6 text-gray-100">
                    {{ $course->description }}
                </p>
        
                <!-- Buttons -->
                <div class="flex flex-wrap gap-4 mb-6">
                    @if ($lessons->isNotEmpty())
                    <a href="{{ route('episode', [$course, 'lesson' => $lessons->first()->position]) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded text-sm font-semibold">
                     ▶ Play Series
                 </a>
                 @endif
                </div>
        
                <!-- Metadata -->
                <div class="flex gap-4 text-sm text-gray-400 mb-6">
                  <div class="bg-gray-800 px-3 py-1 rounded">Last Updated: Jan 4, 2024</div>
                  <div class="bg-gray-800 px-3 py-1 rounded">Techniques</div>
                </div>
        
                <!-- Series Header -->
                <div class="flex flex-wrap items-center justify-between gap-4 text-sm text-gray-400 bg-gray-800 p-4 rounded mb-6">             
                    <div class="flex gap-4">
                        <span>📺 {{ $course->lessons->count() }} episodes</span>
                
                    </div>

                    <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">Complete Series</button>
                </div>
                
                <!-- Series Episodes -->
                <h3 class="text-lg font-bold mt-6 mb-4">// Foundational Terms</h3>
        
                <!-- Episode Card -->
                <div class="space-y-4 max-w-3xl mx-auto">
                    <!-- Lesson 1 -->

                    <div class="space-y-6">
                        @if ($lessons->isNotEmpty())
                        @foreach ($lessons as $lesson)
                        
              <a href="{{ route('episode',
               [$course, 'lesson' => $lesson->position]) }}"
                            class="block">
                            <div class="bg-gray-800 py-6 px-6 rounded-xl flex items-start gap-6 hover:bg-gray-700 transition">
                                <div class="text-2xl font-bold text-white bg-gray-700 w-14 h-14 flex items-center justify-center rounded-full shrink-0">
                                    {{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>
                        
                                <div class="pt-2 pb-2 pr-2">
                                    <h4 class="text-white text-lg font-semibold mb-2">{{ $lesson->title }}</h4>
                                    <p class="text-gray-300 text-sm mb-3">
                                        {{ $lesson->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                    </div>
               
        
              </div>
        </div>
    </section>

@endsection