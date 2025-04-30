@extends('layout.student')
@section('content')

    <div class="bg-gray-900 text-white p-10">
        <div class="container mx-auto max-w-6xl">
       @php
             $instructor = $randomCourse->instructor;
             $instruct = $instructor->instructor;
       @endphp     

     <x-course.meta
    :tag="$randomTag->name" 
    :category="$randomCategory->name" 
    :time="$randomCourse->title" 
    :lesson="$randomCourse->lessons->count()">
   <a href="{{ route('instructor',['instructor' => $instruct->id]) }}" class="hover:underline"> {{ $instructor->name }}</a>
</x-course.meta>

@php
  $firstLesson = $randomCourse->lessons->first();
@endphp

    <x-course.detail

        :title="$randomCourse->title" 
        :description="$randomCourse->description"
        :playUrl="$firstLesson ? route('episode', [
          'course' => $randomCourse->slug,
          'lesson' => $firstLesson->id
      ]) : '#'"
      
      >
        <img src="{{ asset('storage/instructors/' .$instruct->image) }}" alt="Instructor" class="w-56 h-76 shadow-lg">
    </x-course.detail>

</div>


            <x-heading.sub-head>More Currently Featured</x-heading.sub-head>


     <x-scroll.scrollbar>
                
     @foreach ($courses as $course)
     @php
     $instruct = $course->instructor;
     @endphp
    
     
     <x-scroll.section 
      :href="route('series', $course)"
     :title="$course->title"
     img="{{ asset('storage/random_course/three.webp') }}"
 >
 {{ $instruct->name}}
 </x-scroll.section>
 @endforeach

              
          </x-scroll.scrollbar>



  <x-heading.sub-head>World-Class <span class="text-blue-500">Instructors</span></x-heading.sub-head>

<x-scroll.scrollbar>


  @foreach ($instructors as $instructor)
    


<a href="{{ route('instructor',['instructor' => $instructor->id]) }}">
<div class="w-80 h-80 relative shadow-md overflow-hidden">
  <img src="{{ asset('storage/instructors/' . $instructor->image) }}" 
  alt="{{ $instructor->user->name }}" 
       alt="Course Image" 
       class="w-full h-full object-cover" />
  <div class="absolute inset-0 bg-black/50 text-white flex flex-col justify-center items-center text-center px-4">
    <h3 class="text-lg font-semibold">{{ $instructor->user->name }}</h3>
  </div>
</div>

</a>
@endforeach

</x-scroll.scrollbar>



@auth
@if (!auth()->user()->subscriptions()->where('is_active', true)->exists())
<x-subscription-prompt :user="auth()->id()" />
@endif
@endauth







<x-heading.sub-head >
Pick a Topic. Any Topic. </x-heading.sub-head>
<x-scroll.scrollbar>


<div class="container mx-auto px-10 py-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($categories as $category)
            @if ($category->courses->count() > 0)
                <x-card 
               :href="route('topics',  $category->name).'#courses'"
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