@extends('layout.admin')
@section('content')


    <x-admin.navigation />

<x-heading.main-head title="Series">
    Craft beautiful, focused series your members will love to binge.
</x-heading.main-head>



<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">
<x-heading.sub-head>Total Courses</x-heading.sub-head>


<div class="flex justify-end mb-4">
    <a href="{{ route('admin.courses.sort') }}" 
       class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition">
        Short Course
    </a>
</div>



<x-scroll.scrollbar>
    @foreach ($courses as $course)
    <x-scroll.section :title="$course->title"
         :href="route('admin.courses.index',['slug' => $course->slug])"
         img="{{ asset('storage/random_course/three.webp') }}" 
          />

    @endforeach

</x-scroll.scrollbar>




<x-heading.sub-head>Un-Aproved Courses</x-heading.sub-head>
<x-scroll.scrollbar>
    @foreach ($unapprovedCourses as $unapprovedCourse)
    <x-scroll.section :title="$unapprovedCourse->title"
         :href="route('admin.courses.index',['slug' => $unapprovedCourse->slug])"
         img="{{ asset('storage/random_course/two.webp') }}" 
         
         />

    @endforeach

</x-scroll.scrollbar>







    </div>
</div>
    @endsection