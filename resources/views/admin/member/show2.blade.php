@extends('layout.admin')
@section('content')
<x-admin.navigation />


    


<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-5xl">

        <div class="flex flex-col md:flex-row items-start gap-10 mt-10 justify-center">
<div class="w-full md:w-2/3 text-left">
    <h1 class="text-4xl md:text-5xl  text-blue-300 font-extrabold leading-tight">
        {{ $user->name }} 
    </h1>
 
   


    <form action="{{ route('admin.members.send',['user' => $user->id]) }}" 
    method="POST" class="w-full max-w-4xl mt-20">
    @csrf
     <div class="mb-8">

        

        <textarea 
            id="description" 
            name="description"  
            placeholder="Remid to Subscribe..." 
            class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white text-lg h-30 resize-none"
        ></textarea>
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
           remind
        </button>
    </div>
</form>
</div>


 <!-- Instructor Image -->
<div class="w-full md:w-1/3 flex justify-center md:justify-end">
    <img src="{{ vite::asset('resources/images/profile.png') }}" alt="Instructor"
     class="w-[300px] h-[300px] object-contain shadow-lg " >
</div> 



</div>







@endsection

