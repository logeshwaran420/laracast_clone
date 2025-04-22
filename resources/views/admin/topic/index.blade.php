@extends('layout.admin')
@section('content')

    <x-admin.navigation />

    <x-heading.main-head :title="$tag->name">
        Group related courses under a shared theme. Think broad—like yours topic.
    </x-heading.main-head>
    {{-- @dd($categories->map(fn($ca) => $ca->courses)->toArray()) --}}


  
    <div class="container mx-auto px-10 py-4 mt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($categories as $category)
          
          
                    <x-card 
                   :href="route('admin.topics.show', ['catId' => $category->id])"
                        :name="$category->name" 
                        :course-count="$category->courses->count() " 
                        :video-count="$category->courses->sum(fn($course) => $course->lessons->count())"
                                               
                        :image="asset('storage/images/' . $category->image)" 
                    />

            @endforeach

         
        </div>





    </div>
    



    <div class="bg-gray-900 text-white p-10">
        <div class="container mx-auto max-w-6xl">
            <div class="container mx-auto px-10 py-4">


                <div class="flex justify-end mb-6 gap-4">
                    <a href="{{ route("admin.topics.create",["id" => $tag->id]) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4">
                      Add Category
                    </a>
                  
                </div>



    
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
 @foreach ($tag->courses as $course)
                        @foreach ($course->categories as $category)
                            <x-card :name="$category->name"
                                 :course-count="$course->count()"
                                :video-count="$course->lessons->count() " 
                                :image="'https://loremflickr.com/200/200?random='"
                                :href="route('admin.topics.show',['catId' => $category->id])" />
                        @endforeach
                    @endforeach
 </div>
            </div>
        </div>
    </div>
 

    
@endsection