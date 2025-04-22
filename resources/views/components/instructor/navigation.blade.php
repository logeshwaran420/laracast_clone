<!-- Fixed Navbar -->
<nav class="bg-gray-900 border-b border-gray-800 py-4 px-10 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-8">
            <ul class="flex space-x-6 uppercase text-sm font-semibold tracking-wide text-gray-400"><!-- Laracasts-style Admin Navigation -->
                

 <x-nav-link href="/instructor" :active="request()->is('instructor')">Dashboard</x-nav-link>
<x-nav-link href="/instructor/library" :active="request()->is(['instructor/library','instructor/course/*'])">Library</x-nav-link>
<x-nav-link href="/instructor/message" :active="request()->is('instructor/message','instructor/message/*','instructor/lesson/*')">Message</x-nav-link>
<x-nav-link href="/instructor/user" :active="request()->is('instructor/user','instructor/user/*')">User</x-nav-link>
           
           


                

</ul>
        </div>

        <div class="absolute left-1/2 transform -translate-x-1/2">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo" class="h-8">
        </div>

@auth
    
<div class="flex space-x-6">
    <!-- Search Icon Button (Gray) -->
    <button class="text-gray-300 hover:text-white transition">
        <i class="fas fa-search" style="font-size: 1.5rem;"></i>
    </button>

    <!-- Profile Image -->
    <img src="{{ Vite::asset('resources/images/profile.png') }}" alt="Profile" class="h-8">

    <!-- Log Out Button (Gray) -->
    <form action="{{ route('instructor.logout') }}" method="POST">        
        @csrf
        @method("DELETE")
        <button type="submit" 
            class="px-6 py-2 text-white bg-blue-600  font-semibold shadow-md hover:bg-blue-700 transition">
            Log Out
        </button>
    </form>
</div>


@endauth

{{-- 
 @guest
    <div class="flex items-center space-x-4">

    <a href="{{ "login" }}" class="px-6 py-2 text-gray-300 bg-gray-700  hover:bg-gray-600 hover:text-white transition">
        Sign In
    </a>

    <a href="{{ "register" }}" class="px-6 py-2 text-white bg-blue-600  font-semibold shadow-md hover:bg-blue-700 transition">
                Get Started
            </a>
            
</div>

@endguest --}}
</div>


</nav>

<div class="pt-20"></div> 


