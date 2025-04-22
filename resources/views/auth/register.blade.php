<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <div class="bg-gray-800 rounded-lg p-8 max-w-lg w-full shadow-lg relative">
        
        <a href="/" class="absolute top-4 right-4 text-gray-400 hover:text-gray-300 text-2xl">
            <i class="fas fa-xmark"></i>
        </a>    
        
        <h1 class="text-3xl font-extrabold text-gray-300 mb-6 text-center">SIGN UP!</h1>
        
        <form action="{{ 'register' }}" method="POST">
        @csrf
            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-medium mb-1" for="name">Username</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"  
                    placeholder="Enter Username" 
                    class="w-full px-1 py-2 border-0 border-b border-gray-500
                     focus:border-blue-500 focus:ring-0 bg-transparent text-white">
            </div>

            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-medium mb-1" for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"  
                    placeholder="Enter Email"
                    class="w-full px-1 py-2 border-0 border-b 
                    border-gray-500 focus:border-blue-500
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
</div>  <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-3 px-4 rounded-md
                 hover:bg-blue-700 transition duration-200 font-medium mt-4">
                Register
            </button>
            
            <div class="mt-6 text-center">
                <p class="text-gray-400 text-sm font-bold hover:underline">
                    <a href="#">Already have an account?</a> <!-- Added link to login page -->
                </p>
            </div>
        </form>
    </div>
</body>
</html>
