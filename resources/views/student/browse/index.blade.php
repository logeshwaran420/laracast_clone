@extends('layout.student')
@section('content')


    {{-- Auto Redirect to /topics/{categoryName} --}}
    

    {{-- Main Heading --}}
    <x-heading.main-head> 
        <x-slot:title>
            <span class="text-blue-500">//</span> EXPLORE BY TOPICS
        </x-slot:title>
        All Laracasts series are categorized into various
        <a href="#" class="text-blue-400 underline hover:text-blue-300">//topics</a>. 
        This should provide you with an alternate way to decide what to learn next, 
        whether it be a particular framework, language, or tool.
    </x-heading.main-head> 

    {{-- Tag Subnav --}}
    <nav class="mt-6 px-10 py-4">
        <ul class="flex space-x-4 text-lg font-semibold text-gray-400 uppercase">
          
<x-student.subnav-link href="{{ route('browse') }}" :active="!request('tag?')">
    ALL TOPICS
</x-student.subnav-link>
            @foreach ($tags as $tag)
                <x-student.subnav-link
                    href="{{ route('browse', ['tag' => $tag->name]) }}" 
                    :active="request()->route('tag') === $tag->name"
                >
                    {{ $tag->name }}
                </x-student.subnav-link>
            @endforeach
        </ul>
    </nav>

    {{-- Category Grid --}}
    
    <div class="container mx-auto px-10 py-4">
    
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                @if ($category->courses->count() > 0)
                    <x-card 
                        :name="$category->name"
                        :course-count="$category->courses->count()"
                        :video-count="$category->courses->sum(fn($course) => $course->lessons->count())"
                        :image="asset('storage/images/' . $category->image)" 
                        :href="route('topics', ['category' => $category->name]). '#courses'"
                    />
                @endif
            @endforeach
        </div>
       
        <div id="courses">
    <x-heading.sub-head >
        Exploring <span class="text-blue-500">{{ request('category?') }}</span>
    </x-heading.sub-head>

        @if($courses->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-10"> 
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    @endif
</div>


@auth
@if (!auth()->user()->subscriptions()->where('is_active', true)->exists())
<x-subscription-prompt :user="auth()->id()" />
@endif
@endauth
    </div>
@endsection