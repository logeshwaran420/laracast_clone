<div id="registration-modal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 
    z-50 justify-center items-center w-full max-h-full bg-black bg-opacity-50 backdrop-blur-sm"> 
    <div class="bg-gray-800 rounded-lg p-8 max-w-lg w-full shadow-lg relative mt-10">
        
        <button data-modal-hide="registration-modal" 
            class="absolute top-4 right-4 text-gray-400 hover:text-gray-300 text-2xl">
            <i class="fas fa-xmark"></i>
        </button>    
        
        <h1 class="text-3xl font-extrabold text-gray-300 mb-6 text-center">SIGN UP!</h1>
        
        <form action="{{ '/register' }}" method="POST">
        @csrf

        <input type="hidden" name="_modal" value="registration-modal">
        
        <!-- Username -->
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-medium mb-1" for="name">Username</label>
            <input 
                type="text" 
                id="name" 
                name="name"
                value="{{ old('name') }}"
                required  
                placeholder="Enter name" 
                class="w-full px-1 py-2 border-0 border-b border-gray-500
                focus:border-blue-500 focus:ring-0 bg-transparent text-white">
        </div>
    
        <!-- Email -->
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-medium mb-1" for="email">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                @if (session('_modal') === 'registration-modal')
                value="{{ old('email') }}"
                @endif
                placeholder="Enter Email"
                required
                class="w-full px-1 py-2 border-0 border-b 
                border-gray-500 focus:border-blue-500
                focus:ring-0 bg-transparent text-white">
        </div>
        
        <!-- Password -->
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-medium mb-1" for="password">Password</label>
            <div class="relative">
                <input 
                    type="password" 
                    id="password" 
                    name="password"  
                    @if (session('_modal') === 'registration-modal')
                    value="{{ old('password') }}"
                    @endif
                    placeholder="Enter Password"
                    required
                    class="w-full px-1 py-2 border-0 border-b border-gray-500 
                    focus:border-blue-500 focus:ring-0 bg-transparent text-white"
                >
            </div>
        </div>

        <!-- Validation Errors -->
        <div class="mt-6 text-center">
            @if (session('_modal') === 'registration-modal')
            <p class="text-red-500 text-sm">
                @foreach($errors->all() as $error)
                    {{ $error }} 
                @endforeach
            </p>
            @endif
        </div> 

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-blue-600 text-white py-3 px-4 rounded-md
            hover:bg-blue-700 transition duration-200 font-medium mt-4">
            Register
        </button>
        
        <!-- Link to switch modals -->
        <div class="mt-6 text-center">
            <p class="text-gray-400 text-sm font-bold hover:underline">
                <a href="javascript:void(0)" onclick="switchModal('registration-modal','authentication-modal')">
                    Already have an account?
                </a>
            </p>
        </div>
        
        </form>
    </div>
</div>

<script>
    @if (session('_modal') === 'registration-modal')
        const modal = document.getElementById('registration-modal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }                        
    @endif

    function switchModal(hideId, showId) {
        const hideModal = document.getElementById(hideId);
        const showModal = document.getElementById(showId);

        if (hideModal) {
            hideModal.classList.add('hidden');
            hideModal.classList.remove('flex');
        }

        if (showModal) {
            showModal.classList.remove('hidden');
            showModal.classList.add('flex');
        }
    }
</script>
