@extends('layout.instructor')
@section('content')

<x-instructor.navigation />

<x-heading.main-head title="Let’s Clean This Up">
    Something's off. Maybe it’s a bug, maybe it’s just not polished yet—but either way,
     it needs attention.
     Let’s walk through the issue, understand what’s broken, and get things back on track.
</x-heading.main-head>

<div class="flex h-screen">

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">

        <!-- Threads -->
        <div class="space-y-4 mb-8">
         

            <!-- Repeat for more threads -->
            {{-- @foreach ($messages as $message)
        
            <div class="bg-gray-800 p-4 rounded shadow flex items-start space-x-4 
            ">
                <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full" alt="avatar">
                <div class="flex-1">
                    <a href="{{ route('instructor.messages.show',['id' => $message->id]) }}"><h2 class="text-lg font-semibold hover:underline cursor-pointer">
                        {{ $message->subject }}
                    </h2></a>
                    <div class="text-sm text-gray-400 mb-2">
                        <strong>From:</strong> {{ $message->sender->name }}
                        <span class="text-xs px-2 py-0.5 bg-blue-600 rounded ml-2">Sent</span>
                    </div>
                </div>
                <div class="text-right space-y-1">
                   
                    <div class="text-xs px-2 py-1 bg-red-600 rounded">Need-To-Fix</div>
                </div>
            </div>
                    
            @endforeach --}}
            <!-- Add more static thread blocks as needed -->








            @foreach ($messages as $message)
    <div class="bg-gray-800 p-4 rounded shadow flex items-start space-x-4">
        <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full" alt="avatar">
        <div class="flex-1">
            <a href="{{ route('instructor.messages.show',$message) }}">
                <h2 class="text-lg font-semibold hover:underline cursor-pointer">
                    {{ $message->subject }}
                </h2>
            </a>
            <div class="text-sm text-gray-400 mb-2">
                <strong>From:</strong> {{ $message->sender->name }}
                <span class="text-xs px-2 py-0.5 bg-blue-600 rounded ml-2">Sent</span>
            </div>
        </div>

        <div class="text-right space-y-1">
            @if ($message->is_read == 1)
                <!-- Message is read (status = 1) -->
                <div class="text-xs px-2 py-1 bg-green-600 rounded">Fixed   </div>
            @else
                <!-- Message is unread (status = 0) -->
                <div class="text-xs px-2 py-1 bg-red-600 rounded">Need-To-Fix</div>
               
            @endif
        </div>
    </div>
@endforeach

        </div>






        
    </main>
</div>


@endsection








