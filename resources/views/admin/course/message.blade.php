@extends('layout.admin')

@section('content')
<x-admin.navigation/>
<div class="flex items-center justify-center bg-gray-900 px-8 py-12">
    <form action="{{ route('admin.courses.msgStore', ['slug' => $course->slug]) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-4xl bg-gray-800 p-8 rounded-lg shadow-lg">
        @csrf
    
        {{-- Sender ID (hidden) --}}
        <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}">
    
        {{-- Receiver ID (hidden) --}}
        <input type="hidden" name="receiver_id" value="{{ $course->user_id }}">

        <input type="hidden" name="course_id" value="{{ $course->id }}">
    
        {{-- Subject (Title) --}}
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="subject">Subject (Title)</label>
            <input 
                type="text" 
                id="subject" 
                name="subject"  
                value="Fix required for {{ $course->title }}"
                placeholder="Enter the subject or title" 
                class="w-full px-3 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
            >
        </div>
    
        {{-- Body (Description) --}}
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="body">Body (Description)</label>
            <textarea 
                id="body" 
                name="body"  
                placeholder="Enter the body of the content..." 
                class="w-full px-3 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
            ></textarea>
        </div>
    
        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white py-2 px-6 hover:bg-blue-700 transition duration-200 text-lg">
                Submit
            </button>
        </div>
    </form>
    
    
    
</div>


@endsection