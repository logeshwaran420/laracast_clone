@extends('layout.student')
@section('content')

    
    <div class="container mx-auto px-10 py-4">
        
        <div class="pt-10"> 
            <h3 class="text-3xl font-semibold leading-tight text-blue-300 uppercase">
                <span class="text-blue-500">//</span>   Have a Favorite Instructor?
            </h3>
        </div>
          
     
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-10 mt-10">
@foreach ($instructors as $instructor)
    


<a href="{{ route('instructor',['id' => $instructor->user->id]) }}">
<div class="w-80 h-80 relative shadow-md overflow-hidden">
  <img src="{{ asset('storage/instructors/' . $instructor->image) }}" 
  alt="{{ $instructor->user->name }}" 
       alt="Course Image" 
       class="w-full h-full object-cover" />
  <div class="absolute inset-0 bg-black/50 text-white flex flex-col justify-center items-center text-center px-4">
    <h3 class="text-lg font-semibold">{{ $instructor->user->name }}</h3>
  </div>
</div>

</a>

@endforeach
    </div>

</div>
</div>
@endsection