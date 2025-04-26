@extends('layout.admin')
@section('content')
<x-admin.navigation />


    
<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-5xl">

        <div class="flex flex-col md:flex-row items-start gap-10 mt-10 justify-center">
<div class="w-full md:w-2/3 text-left">
    <h1 class="text-4xl md:text-5xl  text-blue-300 font-extrabold leading-tight">
        {{ $subscription->user->name }} 
    </h1>
 
    <p class="text-gray-300 mt-6 text-lg"> 
         {{ $subscription->starts_at }} <b>To</b> {{ $subscription->ends_at  }}
    </p> 

</div>


 <!-- Instructor Image -->
<div class="w-full md:w-1/3 flex justify-center md:justify-end">
    <img src="{{ vite::asset('resources/images/profile.png') }}" alt="Instructor"
     class="w-[300px] h-[300px] object-contain shadow-lg " >
</div> 



</div>












{{-- 
<div class="flex h-screen ">



<div class="space-y-4 mb-8">
         
    @foreach ($messages as $message)

    <div class="bg-gray-800 p-4 rounded shadow flex items-start space-x-4 
    ">
        <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full" alt="avatar">
        <div class="flex-1">
            <a href="{{ route('admin.courses.index',['slug' => $message->course->slug]) }}"><h2 class="text-lg font-semibold hover:underline cursor-pointer">
                {{ $message->subject }}
            </h2></a>
            <div class="text-sm text-gray-400 mb-2">
                <strong>From:</strong> {{ $message->sender->name }}
                <span class="text-xs px-2 py-0.5 bg-blue-600 rounded ml-2">Sent</span>
            </div>
        </div>
        <div class="text-right space-y-1">
            @if ($message->is_read == 1)
                <div class="text-xs px-2 py-1 bg-green-600 rounded">Fixed   </div>
            @else
                <div class="text-xs px-2 py-1 bg-red-600 rounded">Need-To-Fix</div>
               
            @endif
        </div>
    </div>
            
    @endforeach 
    


</div>
</div> --}}




@endsection

