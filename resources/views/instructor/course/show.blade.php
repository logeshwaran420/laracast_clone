@extends('layout.instructor')
@section('content')

<x-instructor.navigation />





<div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 px-6 py-12 text-white">
    <div class="max-w-4xl mx-auto flex flex-col lg:flex-row items-start gap-12">
      
      <!-- Instructor Sidebar -->
      <div class="flex-shrink-0 text-center w-full lg:w-1/4">
        <img 
        src="{{ asset('storage/instructors/'.$instructor->image ) }}" 
class="w-[300px] h-[400px] object-cover shadow-lg mx-auto" 
        alt="{{ $course->instructor->name }}" 
    />
   
      </div>
  
      <!-- Main Course Content -->
      <div class="flex-1 max-w-2xl">


        <div class="flex items-center justify-between mb-6">
        <a href="/instructor/library" class="bg-gray-700 text-white text-sm px-4 py-2 rounded font-medium">
          ↖ Browse Library
        </a>
      
      </div>

        <h1 class="text-5xl font-extrabold text-blue-300 mb-4">{{ $course->title }}</h1>
        <p class="text-lg leading-relaxed mb-6 text-gray-100">
          {{ $course->description }}
        </p>
     
        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 mb-6">
            <!-- Edit Button -->
            <a href="{{ route('instructor.courses.edit', $course->slug) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 text-sm font-semibold rounded">
              Edit Series
            </a>
          
            <!-- Delete Button -->
            <form action="{{ route('instructor.courses.destroy', $course->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this series?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 text-sm font-semibold rounded">
                  Delete Series
              </button>
          </form>
        </div>
           
           
  
          <div class="flex flex-wrap items-center justify-between gap-4 text-sm text-gray-400 bg-gray-800 p-4 rounded mb-6">             
            <div class="flex gap-4">
                <span>📺 {{ $course->lessons->count() }} episodes</span>
        
            </div>

            <a href="{{ route('instructor.lessons.create',  $course) }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
             Add Episodes</a>
        </div>







        <div class="space-y-6">         
          @foreach ($course->lessons as $lesson)
          
          <a href="{{ route('instructor.lessons.show', [$course->slug, $lesson->id]) }}" class="block">
          
              <div class="bg-gray-800 py-6 px-6 rounded-xl flex items-start gap-6 hover:bg-gray-700 transition">
                  <div class="text-2xl font-bold text-white bg-gray-700 w-14 h-14 flex items-center justify-center rounded-full shrink-0">
                      {{ $lesson->position }}
                  </div>
      
                  <div class="pt-2 pb-2 pr-2">
                      <h4 class="text-white text-lg font-semibold mb-2">{{ $lesson->title   }}</h4>
                      <p class="text-gray-300 text-sm mb-3">
                         {{$lesson->description}}
                      </p>
                  </div>
              </div>
              @endforeach
          </a>
      
          <!-- Duplicate the block above for more lessons -->
      </div>
      
  
      
      </div>
    </div>
  </div>
  




@endsection
