@extends('layout.instructor')

@section('content')
<x-instructor.navigation/>

<x-heading.main-head title="Edit Profile">
    Update your profile details below
</x-heading.main-head>

<div class="flex items-center justify-center bg-gray-900 px-8 py-12">
    <form action="{{ route('instructor.users.update',$instructor) }}" 
        method="POST" enctype="multipart/form-data" class="w-full max-w-4xl">
        @csrf
        <!-- Assuming you are using PUT for updating data -->

        <!-- Name -->
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="name">Full Name</label>
            <input 
                type="text" 
                id="name" 
                name="name"  
                value="{{ auth()->user()->name }}"
                placeholder="Enter your full name" 
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
            >
        </div>
    
        <!-- Description -->
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="description">Description</label>
            <textarea 
                id="description" 
                name="description"  
                placeholder="Write a short description about yourself..." 
                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
            >{{$instructor->description}}</textarea>
        </div>
    
        <!-- Profile Image -->
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-medium mb-2" for="image">Profile Image</label>
            <input 
                type="file" 
                id="image" 
                name="image" 
                accept="image/*" 
                class="text-white"
            >
           <div class="mt-4">
    @if($instructor->image)
        <img src="{{ asset('storage/instructors/' . $instructor->image) }}" alt="Profile Image"  class="w-16 h-16 object-cover rounded-full">
    @else
        <p>No profile image set.</p>
    @endif
</div>
        
            </div>
       
    
        <div class="text-center text-red-500 text-sm mb-6">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    
        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 text-white py-3 px-6 hover:bg-blue-700 transition 
                duration-200 text-lg">
                Change Info
            </button>
        </div>
    </form>
</div>

@endsection
