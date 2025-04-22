@extends('layout.instructor')

@section('content')
<x-instructor.navigation/>

<x-heading.main-head title="Edit Series">
    Update your course details and keep your content fresh and engaging.
</x-heading.main-head>

<div class="flex items-center justify-center bg-gray-900 px-8 py-12">
    <form action="{{ route('instructor.courses.update', $course->slug) }}"
         method="POST" class="w-full max-w-4xl">
        @csrf
        @method('put')


       
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="title">Course Title</label>
            <input 
                type="text" 
                id="title" 
                name="title"  
                placeholder="Enter Course Title" 
                value="{{ $course->title }}"
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
            >
        </div>
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="description">Course Description</label>
            <textarea 
                id="description" 
                name="description"  
                placeholder="Write a short description..." 
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
            >{{$course->description}}
        </textarea>
        </div>

        {{-- Error Messages --}}
     
        <div class="text-center text-red-500 text-sm mb-6">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
           
       
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white py-3 px-6 hover:bg-blue-700 transition 
                duration-200 text-lg">
                Update Course
            </button>
        </div>
    </form>
</div>

@endsection
