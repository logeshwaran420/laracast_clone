

@extends('layout.admin')
@section('content')
<x-admin.navigation />


    
<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-5xl">

        <div class="flex flex-col md:flex-row items-start gap-10 mt-10 justify-center">
<div class="w-full md:w-2/3 text-left">
    <h1 class="text-4xl md:text-5xl  text-blue-300 font-extrabold leading-tight">
        {{ $instructor->user->name }}
    </h1>

    <p class="text-gray-300 mt-6 text-lg"> 
         {{ $instructor->description }}
    </p>

</div>



<!-- Instructor Image -->
<div class="w-full md:w-1/3 flex justify-center md:justify-end">
    <img src="{{ asset('storage/instructors/'  . $instructor->image) }}" alt="Instructor"
     class="w-[300px] h-[300px] object-contain shadow-lg rounded-lg" >
</div>

</div>

<x-heading.sub-head>
    courses</x-heading.sub-head>
<x-scroll.scrollbar>

 @foreach ($courses as $course)

     <x-scroll.section  :title="$course->title"
          :href="route('admin.courses.index', $course)"
          img="{{ asset('storage/random_course/three.webp') }}" 
           />
 
     @endforeach
    </x-scroll.scrollbar>




@endsection
