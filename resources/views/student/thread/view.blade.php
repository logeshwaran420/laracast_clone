@extends('layout.student')

@section('content')
<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">
        <div class="flex min-h-screen">
            <!-- Main Content -->
            <div class="flex-1 p-6 space-y-6">

                <!-- Thread Title -->
                <div class="bg-gray-800 p-5 ml-16 relative">
                    <h2 class="text-xl font-semibold mb-2">{{ $thread->title }}</h2>
                </div>

                <!-- Instructor Info -->
                <div class="flex space-x-4 bg-gray-800 p-10">
                    <img src="{{ asset('storage/images/profile3.webp') }}" class="w-24 h-24 rounded shadow" alt="Instructor">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $thread->user->name }}</h1>
                        <p class="text-sm text-gray-300 mt-1">{{ $thread->body }}</p>

                        @if (auth()->id() === $thread->user_id)
                        <form action="{{ route('thread.destroy', ['category' => $category, 'thread' => $thread]) }}" method="POST"
                             onsubmit="return confirm('Are you sure you want to delete this thread?This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600 text-xs">Delete</button>
                        </form>
                    @endif
                    
                    </div>
                </div>

                <!-- Reply Form -->
                @auth
                    
                <div class="flex space-x-4 mb-4 ml-16">
                    <img src="{{ Vite::asset('resources/images/profile.png') }}" class="w-12 h-12 rounded-full">
                    <div class="flex flex-col w-full">
                        <form action="{{ route('thread.channels.replystore', ['category' => $category, 'thread' => $thread]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="thread_id" value="{{ $thread->id }}">

                            <textarea name="body" placeholder="WRITE A REPLY." class="w-full p-2 bg-gray-700 text-white rounded" rows="2" required></textarea>

                            <div class="flex justify-end mt-2">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-3 rounded">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @endauth

                <!-- Replies -->
                @foreach ($replies as $reply)
                    <div class="bg-gray-800 p-6 ml-16">
                        <div class="space-y-6">
                            <div class="flex space-x-4">
                                <img src="{{ asset('storage/images/profile2.webp') }}" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-bold">{{ $reply->user->name }}</p>
                                    <p class="text-gray-300 text-sm mt-1">{{ $reply->body }}</p>
                                </div>
                                @if (auth()->id() === $reply->user_id)
                                    <form action="{{ route('thread.channels.replydelete', ['category' => $category, 'thread' => $thread, 'reply' => $reply]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 text-xs">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
