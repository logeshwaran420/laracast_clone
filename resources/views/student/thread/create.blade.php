@extends('layout.student')
@section('content')


<div class="flex items-center justify-center bg-gray-900 px-8 py-12">

    <form action="{{ route('thread.store') }}" method="POST" class="w-full max-w-4xl bg-gray-800 p-8 rounded-lg shadow-lg">
        @csrf
    
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    

        <div class="mb-8 flex justify-between items-center">
            <div class="w-3/4">
                <input 
                    type="text" 
                    id="title" 
                    name="title"  
                    placeholder="Add a Title" 
                    class="w-full px-3 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
                >
            </div>
            

            <div class="w-1/4 pl-4">
    <select 
                    id="category" 
                    name="category" 
                    class="w-full px-4 py-2 border border-gray-600  bg-gray-800 text-white text-lg focus:outline-none focus:ring-2 transition duration-300 ease-in-out"
                >
                <option value="" disabled selected>Select Channel</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
                </select>
            </div>
        </div>
    
        <div class="mb-8">
       
            <textarea 
                id="body" 
                name="body"  
                placeholder="What's on your mind?" 
                class="w-full px-3 py-2 border-0 border-b
                 border-gray-500 focus:border-blue-500 
                 focus:ring-0 bg-transparent text-white 
                 text-lg h-40 resize-none"
            ></textarea>
        </div>


        <div class="text-center text-red-500 text-sm mb-6">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>



    
        <div class="flex justify-end gap-4">
            <a href="{{ url()->previous() }}" 
            type="submit" 
            class="text-grey text-white py-2 px-6 transition duration-200 text-lg">
          cancel
        </a>
            <button 
                type="submit" 
                class="bg-blue-600 text-white py-2 px-6 hover:bg-blue-700 transition duration-200 text-lg">
            Post
            </button>
        </div>
    </form>
    
    
    
    
</div>

@endsection