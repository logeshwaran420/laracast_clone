<div class="bg-gray-900 text-white min-h-screen flex items-center justify-center px-4">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <!-- Left Image Section -->
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/images/subs.png') }}" alt="Laracasts Characters" class="w-64 md:w-80">
        </div>

        <!-- Text Section -->
        <div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                A massive community of <br class="hidden md:block" />
                programmers just like you.
            </h1>
            <p class="text-lg text-gray-300 mb-4">
                Think of Laracasts sort of like Netflix, but for developers. You could spend weeks binging,
                and still not get through all the content we have to offer.
            </p>
            <p class="text-lg text-gray-300 mb-6">
                Push your web development skills to the next level, through expert screencasts on PHP,
                Laravel, Vue, and much more.
            </p>
            <a href="{{ route('subscribe', $user) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                Subscribe!
            </a>
        </div>
    </div>
</div>
