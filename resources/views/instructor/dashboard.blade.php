@extends('layout.instructor')
@section('content')

<x-instructor.navigation />

<x-heading.main-head title="Get Started">
    This is your space to create, manage, and track all of your 
    courses and lessons. Let’s make teaching even easier.
</x-heading.main-head>


<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">


        <!-- Dashboard Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Total Courses -->
            <div class="bg-gray-800 p-6 shadow-md">
                <p class="text-gray-400 text-sm">Total Courses</p>
                <p class="text-3xl font-bold mt-2">{{ $courses->count() }}</p>
            </div>

            <!-- Total Lessons for all Courses -->
            <div class="bg-gray-800 p-6 shadow-md">
                <p class="text-gray-400 text-sm">Total Lessons</p>
                <p class="text-3xl font-bold mt-2">
                    {{ $courses->sum(function ($course) { return $course->lessons->count(); }) }}
                </p>
            </div>

            

            <div class="bg-gray-800 p-6 shadow-md">
                <p class="text-gray-400 text-sm">Fixed Courses</p>
                <p class="text-3xl font-bold mt-2">{{ $fixedCount }}</p>
            </div>

            
            
            <div class="bg-gray-800 p-6 shadow-md">
                <p class="text-gray-400 text-sm">Needs-To-Fix</p>
                <p class="text-3xl font-bold mt-2">{{ $needToFixCount}}</p>
            </div>





        </div>





    </div>

        <x-heading.sub-head >path   </x-heading.sub-head>





        <div class="bg-gray-900 rounded-xl p-6 shadow-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Courses -->
            @foreach ($courses as $course)
            <div class="bg-gray-800 p-6 shadow-md rounded">
                <p class="text-gray-400 text-sm">{{ $course->title }}</p>
                <p class="text-3xl font-bold mt-2">{{ $course->shorts }}</p>
                <p class="text-gray-400 mt-1 text-sm">
                    {{ $course->lessons->count() }} Lessons
                </p>
            </div>
        @endforeach
        
           
        </div>
        </div>

       
    </div>
</div>

@endsection
