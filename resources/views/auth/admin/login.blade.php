

@extends('layout.admin')
@section('content')



    <x-admin.navigation />


   
   
    <div id="loginModal"
     class="flex hidden overflow-y-auto 
overflow-x-hidden fixed top-0 right-0
left-0 z-50 justify-center items-center w-full
md:inset-0 h-30px max-h-full
bg-black bg-opacity-50 backdrop-blur-sm z-40">


        <div class="bg-gray-800 rounded-lg p-8 max-w-lg w-full shadow-lg relative">
            <h1 class="text-3xl font-extrabold text-gray-300 mb-6 text-center">LOG IN</h1>
            <!-- Example login form -->
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-medium mb-1" for="email">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"  
                            placeholder="Enter Email" 
                            class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500
                             focus:ring-0 bg-transparent text-white">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-medium mb-1" for="password">Password</label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password"  
                                placeholder="Enter Password" 
                                class="w-full px-1 py-2 border-0 border-b border-gray-500 focus:border-blue-500 focus:ring-0 bg-transparent text-white"
                            >
                            
                        </div>
                    </div>
        
        
        
        
        
                    <div class="mt-6 text-center">
            <p class="text-red-500 text-sm">
                @foreach($errors->all() as $error)
                    {{ $error }} 
                @endforeach
            </p>
        </div>  
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white py-3 px-4 rounded-md
                         hover:bg-blue-700 transition duration-200 font-medium mt-4">
                       Log In
                    </button>
                    
                   
                </form>
             </div>
    </div>
        
        @if(request()->routeIs('admin.login'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('loginModal')?.classList.remove('hidden');
        });
    </script>
    @endif

 


@endsection 