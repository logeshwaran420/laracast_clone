@extends('layout.admin')

@section('content')
<x-admin.navigation />

<x-heading.main-head title="Control the Flow">
    Your content, your order. Set the sequence of your courses 
    exactly how you want your students to experience them.
</x-heading.main-head>



<div class="flex items-center justify-center min-h-screen bg-gray-900 px-4 py-12">
    <form action="{{ route('admin.courses.sortUpdate') }}" 
          method="POST"
          class="bg-gray-800 w-full max-w-4xl p-10 rounded-xl shadow-lg">
        
        @csrf

        @foreach($courses as $course)
        <div class="mb-6 flex items-center justify-between gap-4">
            <label class="text-gray-300 text-lg font-medium w-2/3">
                {{ $course->title }}
            </label>
    
            <input 
                type="number" 
                name="shorts[{{ $course->id }}]" 
                value="{{ $course->shorts }}"
                class="w-24 bg-transparent border-0 border-b-2 border-gray-600 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-0 text-center text-lg py-2"
                placeholder="__"
            >
        </div>
    @endforeach

    
    @if ($errors->any())
    <div class="text-red-500 text-sm mb-6">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    
        <div class="mt-8 flex justify-end">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 px-6 transition">
                sort course
            </button>
        </div>
    </form>
</div>


@endsection