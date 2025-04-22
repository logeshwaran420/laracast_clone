@extends('layout.instructor')
@section('content')

<x-instructor.navigation />
<x-heading.main-head title="Library">
    This is your creative space. Craft new lessons, manage your courses, and share your knowledge with the world
</x-heading.main-head>


<div class="max-w-6xl mx-auto px-4 py-10">
    
    <div class="flex justify-between items-center mb-6">
       <x-heading.sub-head>My Courses</x-heading.sub-head>
 </div>
 <div class="flex">
    <a href="{{ route('instructor.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 ml-auto">
        + Create New
    </a>
</div>

<x-scroll.scrollbar>
    @foreach($courses as $course)
    <x-scroll.section 
        :title="$course->title" 
        :href="'course/' . $course->slug" 
         img="{{ asset('storage/random_course/three.webp') }}"
    />
@endforeach
        
</x-scroll.scrollbar>       
  

@php
    $randomCourses = $courses->count() ? $courses->random(1) : $courses;
@endphp


<div class="flex justify-between items-center mb-6">
    
@foreach ($randomCourses as $course)

    <x-heading.sub-head>{{ $course->title }}</x-heading.sub-head>
    
   
 </div>

 <x-scroll.scrollbar>
        @forelse ($course->lessons as $lesson)
            <x-scroll.section :title="$lesson->title" href="{{ route('instructor.lessons.show', [$course->slug, $lesson->id]) }}"  img="{{ asset('storage/random_course/one.webp') }}"></x-scroll.section>


            @empty
            <p class="text-gray-400 text-sm px-4 italic">
                This course is feeling a bit lonely — no lessons here yet. 
                <a href="{{ route('instructor.lessons.create', $course->slug) }}" class="text-blue-500 hover:underline">
                    Let’s fix that!
                </a>
            </p>
        @endforelse
</x-scroll.scrollbar>
@endforeach    








</div>


@endsection
