@extends('layout.student')

@section('content')

<script>
    function showLoginPopup(event) {
        event.preventDefault();
        alert("Please sign in to start a new discussion.");
    }
</script>

<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">
        <div class="flex h-screen">

            <!-- Sidebar -->
            <aside class="w-64 p-4 space-y-6">
                <!-- New Discussion Button -->
                @auth
                    <a href="{{ route('thread.create') }}"
                       class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6  text-center">
                        New Discussion
                    </a>
                @endauth

                @guest
                    <a href="#" onclick="showLoginPopup(event)"
                       class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6  text-center">
                        New Discussion
                    </a>
                @endguest

                <!-- Popular Channels -->
                <div>
                    <h2 class="text-sm text-gray-400 font-bold uppercase mb-2">// Popular Channels</h2>        
                    <ul class="flex flex-wrap gap-2 mt-3">
                        <li>
                            @php
                                $isAllActive = request()->routeIs('thread.channels');
                                $allClasses = $isAllActive
                                    ? 'text-white font-semibold bg-blue-500'
                                    : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                            @endphp
                            <a href="{{ route('thread.channels') }}"
                               class="text-xs {{ $allClasses }} px-3 py-1 ">
                                All
                            </a>
                        </li>
                   @foreach ($categories as $category)
                            @php
                                $isActive = request()->is('discuss/channels/' . $category->name);
                                $classes = $isActive
                                    ? 'text-white bg-blue-500'
                                    : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                            @endphp
                            <li>
                                <a href="{{ route('thread.channels.view', $category) }}"
                                   class="text-xs {{ $classes }} px-3 py-1 ">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            

                
            </aside>

            {{-- <!-- Main Content -->--}}
           <div class="flex-1 p-6 overflow-y-auto">
                <div class="space-y-4">
                    @foreach ($threads as $thread)
                        <a href="{{ route('thread.channels.show', ['category' => $thread->category, 'thread' => $thread]) }}">
                            <div class="bg-gray-800 p-4  shadow flex items-start space-x-4 mt-4">
                                <img src="{{ asset('storage/images/profile3.webp') }}" class="w-10 h-10 rounded-full" alt="avatar">
                                <div class="flex-1">
                                    <h2 class="text-lg font-semibold hover:underline cursor-pointer">
                                        {{ $thread->title }}
                                    </h2>
                                    <div class="text-sm text-gray-400">
                                        {{ $thread->body }}
                                    </div>
                                </div>
                                <div class="text-right space-y-1">
                                    <div class="text-sm text-gray-400">💬 {{ $thread->replies->count() }}</div>
                                    <div class="text-xs px-2 py-1 bg-pink-600 ">{{ $thread->category->name }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $threads->links() }}
                </div>

                



            </div>









        </div>
    </div>
</div>

@endsection
