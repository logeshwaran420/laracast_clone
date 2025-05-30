<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Laracasts Clone</title>
    @vite(["resources/css/app.css","resources/js/app.js"])


</head>
<body class="bg-gray-900 text-white">
   

<x-student.navigation></x-student.navigation>




<main>
    @yield('content')




    <x-student.authentication-modal />
   <x-student.registration-modal />

</main>

<x-footer />
</body>
</html> 





