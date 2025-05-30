@extends('layout.admin')
@section('content')

    <x-admin.navigation />


    <div class="flex items-center justify-center bg-gray-900 px-8 py-12">

        <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-4xl">
            @csrf
        
   
            <input type="hidden" name="role" value="instructor">
        
           
            <div class="mb-8">
                <label class="block text-gray-300 text-sm font-medium mb-2" for="name">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"  
                    placeholder="Enter Name" 
                    class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
                >
            </div>
        
           
            <div class="mb-8">
                <label class="block text-gray-300 text-sm font-medium mb-2" for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"  
                    placeholder="Enter Email" 
                    class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
                >
            </div>
        
            <div class="mb-8">
                <label class="block text-gray-300 text-sm font-medium mb-2" for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"  
                    placeholder="Enter Password" 
                    class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
                >
            </div>
        
            
            <div class="mb-8">
                <label class="block text-gray-300 text-sm font-medium mb-2" for="image">Upload Image</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*"
                    class="block w-full text-sm text-gray-300
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-blue-600 file:text-white
                           hover:file:bg-blue-700"
                >
            </div>
        
          
            <div class="mb-8">
                <label class="block text-gray-300 text-sm font-medium mb-2" for="description">Bio / Description</label>
                <textarea 
                    id="description" 
                    name="description"  
                    placeholder="Write a short instructor bio..." 
                    class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
                ></textarea>
            </div>
        
            <div class="text-center text-red-500 text-sm mb-6">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white py-2 px-6 hover:bg-blue-700 transition 
                    duration-200 text-lg">
                    Create
                </button>
            </div>
        </form>
        
        
    </div>
    

    @endsection