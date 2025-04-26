@extends('layout.admin')

@section('content')
<x-admin.navigation/>

<x-heading.main-head title="Which Courses Belong Here?">
    Tick the boxes to link courses to this category. You can always come back and adjust them later.

</x-heading.main-head>

<div class="flex items-center justify-center bg-gray-900">

    <form action="{{ route('admin.topics.added', $category) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-4xl space-y-10">
        @csrf
        @method("put")

        <div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach ($allCourses as $course)
                    <label class="inline-flex items-center space-x-2 text-gray-200">
                        <input 
                            type="checkbox" 
                            name="courses[]" 


                            value="{{ $course->id }}"
                            {{ $selectedCourses->contains($course->id) ? 'checked' : '' }}
         class="form-checkbox h-5 w-5 text-blue-600 bg-gray-700 border-gray-500 focus:ring-blue-500"
                        >



                        <span class="ml-2">{{ $course->title }}</span>
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
            Add course
            </button>
        </div>
    </form>
    
    
    </div>











@endsection