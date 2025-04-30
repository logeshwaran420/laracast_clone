@extends('layout.admin')
@section('content')

    <x-admin.navigation />

    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 px-6 py-12 text-white">
        <div class="max-w-4xl mx-auto flex flex-col lg:flex-row items-start gap-12">
     
         
          <!-- Main Course Content -->
          <div class="flex-1 max-w-2xl">
      
            <div class="flex items-center justify-between mb-6">
          



          </div>


            <h1 class="text-5xl font-extrabold text-blue-300 mb-4">{{ $course->title }}</h1>
            <p class="text-lg leading-relaxed mb-6 text-gray-100">
                {{ $course->description }}
            </p>
         
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4 mb-6">
                <!-- Edit Button -->
                <form action="{{ route('admin.courses.toggleStatus', $course->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="{{ $course->status ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}
                               text-white px-6 py-3 text-sm font-semibold">
                        {{ $course->status ? 'Unpublish' : 'Publish' }}
                    </button>
                </form>
               @if ($course->status == 0 && !$course->message) 
                 <a href="{{ route('admin.courses.message', $course->slug) }}"
                   class="px-6 py-3 text-sm font-semibold bg-red-600 hover:bg-red-700 text-white">Needs Fix</a>
                    @endif



            </div>
               
               
      
              <div class="flex flex-wrap items-center justify-between gap-4 text-sm text-gray-400 bg-gray-800 p-4 rounded mb-6">             
                <div class="flex gap-4">
       <span>Total Episodes {{ $lessons->count()}}</span>
            
                </div>

            @if ($course->status == 0 && $course->message && $course->message->is_read == 0)
  <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">On Progress</button>
@elseif ($course->status == 0 && $course->message && $course->message->is_read == 1)
  <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-500">Completed</button>
@endif

              
            </div>
    
            <div class="space-y-6">  
              
              <a class="block"> 
                  
          @foreach ($lessons as $lesson)
              
          <div class="bg-gray-800 py-6 px-6 rounded-xl flex items-start gap-6 ">
                      <div class="text-2xl font-bold text-white bg-gray-700 w-14 h-14 flex items-center justify-center rounded-full shrink-0">
                      {{ $lesson->position }}
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
          </div>
          
      
          
          </div>
        </div>
      </div>

    @endsection