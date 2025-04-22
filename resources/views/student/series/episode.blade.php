 <!DOCTYPE html>
<html lang="en" class="bg-gray-900 text-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Viewer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen overflow-hidden">

<div class="flex h-full">

    <!-- Sidebar -->
    <aside class="w-80 bg-gray-800 p-5 overflow-y-auto">
        <a href="{{ route('series', ['slug' => $course->slug]) }}" 
           class="bg-gray-700 text-white text-sm px-3 py-1 rounded font-medium mb-3 block text-center"
           aria-label="Go to Series Overview">
            ↖ Series Overview
        </a>

        <div class="flex items-center gap-2 mb-6">
            <div>
                <h1 class="text-lg font-semibold leading-tight">{{ $course->title }}</h1>
                <span class="text-xs text-gray-400">Series Overview</span>
            </div>
        </div>

        <!-- Lessons List -->
        @if ($lessons->isNotEmpty())
            <div class="space-y-2 text-sm">
                @foreach ($lessons as $lesson)
                    <a href="{{ route('episode', ['slug' => $course->slug, 'position' => $lesson->position]) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-lg 
                              {{ optional($currentLesson)->position == $lesson->position ? 'bg-blue-600 font-semibold text-white' : 'hover:bg-gray-700' }}">
                        {{ $lesson->title }}
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-400">No lessons available.</p>
        @endif
    </aside>

    <!-- Main Content -->
    @auth
    <main class="flex-1 p-6 overflow-y-auto">
        @if ($currentLesson)
            <!-- Video Player -->
            <div class="aspect-w-16 aspect-h-9 bg-black rounded-xl overflow-hidden shadow mb-8">
                <video controls class="w-full rounded">
                    <source src="{{ Storage::url('videos/' . $currentLesson->video_url . '.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Lesson Title -->
            <h2 class="text-2xl font-bold mb-2 text-center">{{ $currentLesson->title }}</h2>

            <!-- Description -->
            <p class="text-gray-300 leading-relaxed mb-8 text-center">
                {{ $currentLesson->description }}
            </p>
        @else
            <div class="text-center text-gray-400 text-lg mt-20">
                <p>Select a lesson to begin watching.</p>
            </div>
        @endif

        <div class="max-w-5xl mx-auto mt-12">
            <div class="flex items-start gap-8">
                <img src="{{ asset('storage/instructors/' . $course->user->instructor->image) }}"
                     class="w-64 h-64 object-cover shadow-lg"
                     alt="Instructor" />
        
                <div class="bg-gray-800 p-6 text-left shadow flex-1 h-64 overflow-auto">
                    <h2 class="text-2xl font-bold text-blue-300">{{$course->user->name}}</h2>
                    <p class="mt-4 text-sm text-gray-300">{{ $course->user->instructor->description }}</p>
                </div>
            </div>
        </div>


        
       
<form action="{{ route('comment_store',['slug'=>$course->slug,'position'=>$currentLesson->id ?? null]) }}" method="POST">
    @csrf

    <input type="hidden" name="lesson_id" value="{{ $currentLesson->id ?? null}}">
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

    <div class="max-w-2xl mx-auto mb-6 mt-6">
        <div class="flex space-x-4">
            <img src="{{ auth()->user()->profile_photo_url ?? 'https://via.placeholder.com/50' }}" class="w-12 h-12 rounded-full" alt="User">
    
            <div class="flex-1">
                <textarea name="body" placeholder="WRITE A REPLY."
                          class="w-full p-4 bg-gray-700 text-white rounded resize-none text-sm"
                          rows="4" required></textarea>

                <div class="flex justify-end mt-3">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-6 py-3 rounded">
                        Post
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


        

@foreach ($comments as $comment)
          
<div class=" p-6 rounded mt-4 relative">
    <div class="space-y-6">
        <div class="flex space-x-4">
            <img src="https://via.placeholder.com/50" class="w-12 h-12 rounded-full">
            <div class="flex-2">
                <p class="font-bold">{{ $comment->user->name }}</p>
                <p class="text-gray-300 text-sm mt-1">{{ $comment->body }}</p>
            </div>
{{-- 
            @if (auth()->id() === $comment->user_id)
            <form action="{{ route('comment_destroy', ['slug' => $course->slug, 'position' => $comment->id]) }}" method="POST">  @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-600 text-xs">Delete</button>
                </form>
            @endif --}}
        </div>
    </div>
</div>
                    @endforeach

    </main>
    @endauth




@guest

        <main class="flex-1 flex flex-col items-center justify-center px-8 text-center">
          <div class="bg-[#1E293B] p-10 shadow-lg max-w-lg w-full">
            <div class="mb-6">
              <div class="w-16 h-16 mx-auto bg-gray-800 rounded-lg flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 2L2 20h16L10 2z" />
                </svg>
              </div>
            </div>
            <h2 class="text-2xl font-bold mb-2">"BREAKING DOWN COMPONENTS"</h2>
            <p class="text-gray-400 mb-6">is for subscribers only.</p>
            <p class="text-sm text-gray-300 mb-6">
              For the cost of a pizza, you'll gain access to this and hundreds of hours worth of content from top developers in the Laravel space!
            </p>
            <div class="flex justify-center space-x-4">
              <a href="/login" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">Log In</a>
            </div>
          </div>
      
          <p class="mt-6 text-sm text-gray-500">
            Learn by doing. <a href="/register" class="text-blue-400 underline"> Start now</a>.
          </p>
        </main>
     
        @endguest



















</div>

</body>
</html>






















