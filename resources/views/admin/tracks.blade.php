@extends('layout.admin')
@section('content')

    <x-admin.navigation />

<x-heading.main-head title="Tracks">

    Bundle your courses into focused, progressive paths  
     
</x-heading.main-head>


<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">

<x-heading.sub-head>Total Topics</x-heading.sub-head>

<x-scroll.scrollbar>
    @foreach ($tags as $tag)
    <x-scroll.section :title="$tag->name" 
        :href="route('admin.topics.index',$tag) "
        img="{{ asset('storage/random_course/two.webp') }}" 
        />
    @endforeach
</x-scroll.scrollbar>



    
<x-heading.sub-head>Total Categories</x-heading.sub-head>



<x-scroll.scrollbar>
    @foreach ($categories as $category)
    <x-scroll.section :title="$category->name"
         :href="route('admin.topics.show',$category)"
         
         img="{{ asset('storage/random_course/five.png') }}" 
         />
        
         @endforeach
</x-scroll.scrollbar>










    @endsection