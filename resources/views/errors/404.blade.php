<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Uh-Oh:404</title>
  <script src="https://cdn.tailwindcss.com" ></script>
</head>
<body class="bg-[#0a1a2f] text-white min-h-screen flex items-center justify-center px-6">

  <div class="flex flex-col md:flex-row items-center justify-between max-w-5xl w-full">
    

    <div class="text-center md:text-left md:w-1/2 space-y-6">
      <h1 class="text-4xl font-bold">You have ventured into 404 space.</h1>
      <p class="text-gray-400 text-sm">(Page Not Found)</p>
      <p class="text-gray-300">
        We are the Borg. Your biological and technological distinctiveness will be added to our own. Resistance is futile.
      </p>
      <div class="flex justify-center md:justify-start gap-4 mt-4">
        <a href="/register" class="bg-gray-700 px-6 py-2  hover:bg-gray-600">Sign Up To Fight</a>
        <a href="/" class="bg-blue-600 px-6 py-2  hover:bg-blue-500">Beam Me Home</a>
      </div>
    </div>


    <div class="mt-10 md:mt-0 md:w-1/2 flex justify-center">
      <img src="{{ asset('storage/images/404.png') }}"" alt="Borg Icon" class="w-40 h-40 rounded-full" />
    </div>

  </div>

</body>
</html>
