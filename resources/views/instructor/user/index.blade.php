@extends('layout.instructor')

@section('content')
<x-instructor.navigation/>

    
      <div class="bg-gray-900 text-white p-10">
        <div class="container mx-auto max-w-5xl">

            <div class="flex flex-col md:flex-row items-start gap-10 mt-10 justify-center">
    <div class="w-full md:w-2/3 text-left">
        <h1 class="text-4xl md:text-5xl  text-blue-300 font-extrabold leading-tight">
            {{ auth()->user()->name }}
        </h1>

        <p class="text-gray-300 mt-6 text-lg"> 
             {{ $instructor->description }}
        </p>

        <div class="mt-8 flex gap-4">
            <a href="{{ route('instructor.users.edit',['id'=>auth()->user()->id]) }}"
                class="bg-blue-600 hover:bg-blue-500 px-6 py-3 text-lg font-semibold inline-block text-white ">
                 Edit Info
             </a>
           
        </div>
    </div>

    <!-- Instructor Image -->
    <div class="w-full md:w-1/3 flex justify-center md:justify-end">
        <img src="{{ asset('storage/instructors/' . $instructor->image) }}" alt="Instructor" class="w-[300px] h-[300px] object-contain shadow-lg rounded-lg">
    </div>
</div>

@endsection