<div class="container mx-auto px-10 py-4">
    <footer class="bg-gray-800 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- About Section -->
                <div>
                    <h1 class="text-xl font-semibold text-white">LARACASTS</h1>
                    <p class="text-sm mt-2">
                        The best way to learn web development, with a focus on Laravel and modern PHP techniques.
                    </p>
                </div>
    
                <!-- Useful Links -->
                <div>
                    <p class="text-lg font-semibold text-white">Useful Links</p>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Courses</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">Support</a></li>
                    </ul>
                </div>
    
                <!-- Support -->
                <div>
                    <p class="text-lg font-semibold text-white">Support</p>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white">Refund Policy</a></li>
                    </ul>
                </div>
    
                <!-- Optional: Newsletter or Socials -->
                <div class="flex flex-col items-center">
                    <p class="text-lg font-semibold text-white">Stay Updated</p>
                    <p class="text-sm mt-2 text-center">Subscribe to our newsletter or follow us on social media.</p>
                    <!-- You can add a subscribe form or icons here -->
                    <form action="{{ route('newsletter') }}" method="POST" class="mt-4 flex justify-center w-full max-w-sm">
                        @csrf  <!-- CSRF token for protection -->
                        <input type="email" name="email" placeholder="Your Email Address" class="p-2 border border-gray-300 focus:outline-none w-full text-sm placeholder-gray-400" required />
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-2">Subscribe</button>
                    </form>
                </div>
            </div>
    
            <!-- Copyright -->
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Laracasts. All rights reserved.
            </div>
        </div>
    </footer>
</div>
