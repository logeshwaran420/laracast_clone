@extends('layout.admin')

@section('content')
<x-admin.navigation/>

<x-heading.main-head title="Edit category">
    Assign topics to categories in just a few clicks.
     It’s a fast and easy way to keep everything organized.
</x-heading.main-head>


<div class="min-h-screen flex items-center justify-center bg-gray-900 px-8 py-12">

<form action="{{ route('admin.topics.update',$category) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-4xl space-y-10">
    @csrf
    @method("put")

    <div>
        <label for="name" class="block text-gray-300 text-sm font-medium mb-2">Name</label>
        <input 
            type="text" 
            id="name" 
            name="name"  
            placeholder="Enter Name" 
            value="{{ $category->name }}"
            class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg"
        >
    </div>


    <div>
        <label for="description" class="block text-gray-300 text-sm font-medium mb-2">Description</label>
        <textarea 
            id="description" 
            name="description"  
            placeholder="Write a short description..." 
            class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-40 resize-none"
        >{{ $category->description}}</textarea>
    </div>

    <div>
        <label for="image" class="block text-gray-300 text-sm font-medium mb-2">Upload Icon</label>
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

    @if($category->image)
    <img src="{{ asset('storage/images/'. $category->image) }}" alt="Profile Image"  class="w-16 h-16 object-cover rounded-full">
@else
    <p>No profile image set.</p>
@endif



<div>
    <label class="block text-gray-300 text-sm font-medium mb-2">
        Select Tags
    </label>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
        @foreach ($allTags as $tag)
            <label class="inline-flex items-center space-x-2 text-gray-200">
                <input 
                    type="checkbox" 
                    name="tags[]" 
                    value="{{ $tag->id }}"
                    {{ $selectedTags->contains($tag->id) ? 'checked' : '' }}
                    class="form-checkbox h-5 w-5 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500"
                >
                <span class="ml-2">{{ $tag->name }}</span> <!-- Add left margin here -->
            </label>
        @endforeach
    </div>
</div>

 
    @if ($errors->any())
        <div class="text-center text-red-500 text-sm">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
   
    <div class="flex justify-end">
        <button 
            type="submit" 
            class="bg-blue-600 text-white py-2 px-6 hover:bg-blue-700 transition duration-200
             text-lg rounded"
        >
        Edit Category
        </button>
    </div>
</form>


</div>

  </select>

@endsection 
