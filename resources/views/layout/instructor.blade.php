
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instructor Panel</title>
    
        <!-- Corrected favicon link -->
        <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
        <!-- Vite assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
<body class="bg-gray-900 text-white">

<main class="p-4">
    @yield('content')
</main>





<x-footer />
</body>
</html>


