@extends('layout.instructor')

@section('content')
<x-instructor.navigation/>

<x-heading.main-head title=" Edit Mode">
    Small changes make a big difference. Let’s polish this episode.
</x-heading.main-head>
<div class="flex items-center justify-center bg-gray-900 px-8 py-12">
    <form action="{{ route('instructor.lessons.update', [$course->slug, $lesson->id]) }}"
         method="POST" enctype="multipart/form-data" class="w-full max-w-4xl">
        @csrf
        @method("put")
    
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="title">Episode Title</label>
            <input 
                type="text" 
                id="title" 
                name="title"  
                placeholder="Enter Lesson Title" 
                value="{{ $lesson->title}}"
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
            >
        </div>
    
        {{-- Lesson Description --}}
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="description">Episode Description</label>
            <textarea 
                id="description" 
                name="description"  
                placeholder="Write a short description..." 
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
            >{{ $lesson->description}}</textarea>
        </div>
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="position">Position</label>
            <input 
                type="number" 
                id="position" 
                name="position" 
                value="{{ old('position', $lesson->position) }}"
                class="w-32 px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
                min="1"
            >
        </div>
        {{-- Video Upload --}}
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="video">Replace Video</label>
            <input 
                type="file" 
                id="video" 
                name="video" 
                accept="video/*" 
                class="text-white"
            >
            @if ($lesson->video_url)
                <p class="text-sm text-gray-400 mt-2">Current video: <code>{{ $lesson->video_url }}</code></p>
            @endif
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
                Update Episode
            </button>
        </div>
    </form>
    
</div>




@endsection
