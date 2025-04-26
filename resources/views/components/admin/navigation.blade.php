<!-- Fixed Navbar -->
<nav class="bg-gray-900 border-b border-gray-800 py-4 px-10 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Left Side (Navigation) -->
        <div class="flex items-center space-x-8">
            <ul class="flex space-x-6 uppercase text-sm font-semibold tracking-wide text-gray-400">
                <!-- Laracasts-style Admin Navigation -->
                <x-nav-link href="/admin" :active="request()->is('admin')">Dashboard</x-nav-link>
                <x-nav-link href="/admin/series" :active="request()->is('admin/series','admin/course/*')">Series</x-nav-link>
                <!-- The heart of the platform -->
                <x-nav-link href="/admin/tracks" :active="request()->is('admin/tracks*','admin/topic/*')">Tracks</x-nav-link>
                <x-nav-link href="/admin/members" :active="request()->is('admin/members','admin/member/*')">Members</x-nav-link>
            </ul>
        </div>

        <!-- Centered Logo -->
        <div class="absolute left-1/2 transform -translate-x-1/2">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo" class="h-8">
        </div>

         @auth
        <div class="flex space-x-6">
           
            <a href="{{ route('admin.search') }}" class="text-gray-300 hover:text-white transition">
                <i class="fas fa-search" style="font-size: 1.5rem;"></i>
            </a>

            <img src="{{ Vite::asset('resources/images/profile.png') }}" alt="Profile" class="h-8">

           <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 font-semibold shadow-md hover:bg-blue-700 transition">
                    Log Out
                </button>
            </form>

            
        </div>
        @endauth

   
    </div>
</nav>

<div class="pt-20"></div> 