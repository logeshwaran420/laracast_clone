@extends('layout.student')
@section('content')

    <div class="container mx-auto px-10 py-4">
        <a href="/browse/instructor" class="inline-block bg-gray-700 text-white text-base px-5 py-3 
    font-semibold mb-4 hover:bg-gray-800 transition min-w-[200px] text-center text-sm">
    ↖View All Instrucors
</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-10">
        
@foreach ( $courses->where('status','1') as $course )
    <x-scroll.section 

                :href="route('series',$course->slug)" 
                :title="$course->title">
            </x-scroll.section>

         
            @endforeach

 
</div>
    </div>
@endsection