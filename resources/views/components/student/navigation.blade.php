<!-- Fixed Navbar -->
<nav class="bg-gray-900 border-b border-gray-800 py-4 px-10 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-8">
            <ul class="flex space-x-6 uppercase text-sm font-semibold tracking-wide text-gray-400">

            <x-nav-link href="{{ route('browse') }}" 
    :active="request()->is('browse') || request()->is([ 'browse/*','topics/*'])">
    Topics
</x-nav-link>
<x-nav-link href="/series" :active="request()->is('series/*','series')">Series</x-nav-link>
 <x-nav-link href="/path" :active="request()->is('path')">Path</x-nav-link>
 <x-nav-link href="/discuss" :active="request()->is('discuss','discuss/*')">Forum</x-nav-link>
  </ul>
        </div>

        <div class="absolute left-1/2 transform -translate-x-1/2">
            <a href="/">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo" class="h-8">
        </a>
        </div>
@auth

<div class="flex space-x-6">
   
    <a href="{{ route('search') }}" class="text-gray-300 hover:text-white transition">
        <i class="fas fa-search" style="font-size: 1.5rem;"></i>
    </a>

    
    <img src="{{ Vite::asset('resources/images/profile.png') }}" alt="Profile" class="h-8">
 
    <form action="/logout" method="POST">        
        @csrf
        @method("DELETE")
        <button type="submit" 
            class="px-6 py-2 text-white bg-blue-600  font-semibold shadow-md hover:bg-blue-700 transition">
            Log Out
        </button>
    </form>
        
</div>


    @endauth

@guest



    <div class="flex items-center space-x-4">

    <button data-modal-target="authentication-modal" 
    data-modal-toggle="authentication-modal" 
     class="px-6 py-2 text-gray-300 bg-gray-700  hover:bg-gray-600 hover:text-white transition">
        Sign In
    </button>

      <button data-modal-target="registration-modal" 
    data-modal-toggle="registration-modal" 
    class="px-6 py-2 text-white bg-blue-600  font-semibold shadow-md hover:bg-blue-700 transition">
                Get Started
</button>
            
</div>

@endguest
</div>


</nav>

<div class="pt-20"></div> 


