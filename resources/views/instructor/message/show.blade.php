@extends('layout.instructor')
@section('content')

<x-instructor.navigation />

<x-heading.main-head title="🛠 Fix Me, Please">
    There's work to do here. Don’t worry—it’s nothing you can’t handle.
</x-heading.main-head>



<div class="max-w-2xl mx-auto p-6 bg-gray-800 dark:bg-gray-900 rounded-2xl 
shadow-lg border border-gray-700 dark:border-gray-700 transition duration-300 mt-10">
<div class="flex items-center justify-between mb-4">
  <a 
    href="{{ route('instructor.courses.show',['slug' => $message->course->slug]) }}" Replace with your actual URL
    class="text-2xl font-bold text-gray-200 dark:text-white hover:text-blue-500 hover:underline hover:underline-offset-4 transition"
  >
    {{ $message->subject }}
  </a>
</div>
    
  
    <!-- Name and Subject -->
    <div class="mb-6">
      <p class="text-gray-300 dark:text-gray-200 mb-4">
        <strong>Sender: </strong> <span class="text-gray-200 dark:text-white">{{ $message->sender->name }}</span>
      </p>
    
    </div>
  
    <!-- Main content -->
    <div class="mb-6">
      <p class="text-gray-300 dark:text-gray-200 mb-4">
        <strong>Message:</strong>
      </p>
  
      <!-- Body of the message -->
      <div class="bg-gray-700 dark:bg-gray-800 p-4 rounded-md mb-4 font-mono text-sm text-gray-200 dark:text-gray-100 border border-gray-600 dark:border-gray-600">
      
        <p class="ml-4">{{$message->body}}</p>
      </div>
  
     
    </div>
  
    
    <div class="flex justify-end space-x-4">
        <!-- Cancel button -->
        <a href="{{ route('instructor.message') }}" class="text-gray-600 dark:text-gray-300  font-medium px-4 py-2">
          Cancel
        </a>
      
        <!-- Completed button -->
        <form action="{{ route('instructor.messages.update', ['id' => $message->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Make sure to use PUT or PATCH for updates -->
            <button type="submit" class="text-white bg-blue-500 dark:bg-blue-600 hover:bg-blue-600 dark:hover:bg-blue-500 font-medium rounded-md px-4 py-2">
                Completed
            </button>
        </form>
      </div>
  
  
@endsection