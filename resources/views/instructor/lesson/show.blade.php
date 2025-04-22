@extends('layout.instructor')

@section('content')
    <x-instructor.navigation />

    <x-heading.main-head :title=" $lesson->title ">
        {{ $lesson->description }}
    </x-heading.main-head>
    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-xl shadow-lg space-y-6">

      
        @if ($lesson->video_url)
            <div class="mt-6 flex justify-center">
                <video controls class="rounded-lg w-full max-w-xl shadow-lg">
                    <source src="{{ asset('storage/videos/' . $lesson->video_url . '.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        {{-- Action Buttons --}}
        <div class="flex items-center justify-between mt-10">
            <a href="{{ route('instructor.lessons.edit', ['slug' => $course->slug, 'id' => $lesson->id]) }}" 
            
            
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 text-sm font-semibold rounded">
                Edit Episode
            </a>
         
                
            <form action="#" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this episode?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 text-sm font-semibold rounded">
                    Delete Episode
                </button>
            </form>
        </div>

    </div>
@endsection
