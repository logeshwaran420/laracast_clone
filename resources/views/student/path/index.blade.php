@extends('layout.student')
@section('content')

<x-heading.main-head title="Learn Path">

    There's a difference between knowing the path, and walking the path.
</x-heading.main-head>


<div class="bg-[#0F172A] text-white min-h-screen py-10 px-6 md:px-20">
  @auth
  @if (!auth()->user()->subscriptions()->where('is_active', true)->exists())
  <x-subscription-prompt :user="auth()->id()" />
  @endif
@endauth
      
    <div class="flex flex-col gap-y-20 max-w-6xl mx-auto">
        @foreach ($courses->chunk(3) as $index => $chunk)
        <div class="flex flex-col md:flex-row gap-10">
           
            <!-- Left Sidebar -->
            <div class="w-full md:w-1/3 bg-[#1E293B] p-6">
                <div class="text-3xl font-bold mb-2">Level {{ $index + 1 }}</div>
                <div class="text-gray-400 mb-6">Series {{ $index + 1 }}</div>

                <p class="text-sm text-gray-300 leading-relaxed">
                    Let's confirm you’re ready for this level of your Larcast journey.
                    <br> 
                    Basic understanding the course for Level {{ $index + 1 }}.
                </
                </p>
            </div>

            <!-- Course Block (3 per chunk) -->
            <div class="w-full md:w-2/3 flex flex-col gap-6">
                @foreach ($chunk as $course)

                @php
    
                $instructors = $course->instructor;
                $instructor = $instructors->instructor;
            @endphp
            
         
                <div class="bg-[#1E293B] p-6 flex flex-col md:flex-row gap-6 items-start">
                    <img src="{{ asset('storage/instructors/'.$instructor->image ) }}"  alt="{{ $course->instructor->name }}"  class="w-40 h-40 ">

                    <div>
                        <h2 class="text-2xl font-bold mb-4">{{ $course->title }}</h2>
                        <p class="text-sm text-gray-300 mb-6 leading-relaxed">
                            {{ $course->description }}
                        </p>
                       
                        <div class="flex gap-4 flex-wrap items-center mb-4">
                            <a href="{{  route('episode', [$course,
                        'lesson' => $course->lessons->first()->position ?? null]) }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 text-sm font-medium inline-block">
                               ▶ Play Series
                            </a>
                        </div>

                        <div class="flex items-center text-sm text-gray-400 gap-4">
                            <span>📄 {{ $course->lessons->count() }} Lessons</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>








@endsection