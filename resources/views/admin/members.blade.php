@extends('layout.admin')
@section('content')

    <x-admin.navigation />
    <x-heading.main-head title="members">
        View and manage the people who power your platform — from active learners to power users.
    </x-heading.main-head>



    
<div class="bg-gray-900 text-white p-10">
    <div class="container mx-auto max-w-6xl">

<x-heading.sub-head>Our Instructors</x-heading.sub-head>

<div class="flex justify-end mb-4">
  <a href="{{ route('admin.members.create') }}" 
     class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition">
     Create Instructor
  </a>
</div>

<x-scroll.scrollbar>
      @foreach ($instructor as $instruct)

  @php
    $ins = $instruct->instructor;

  @endphp


@if($ins)
    <x-scroll.img-section
      img="{{ asset('storage/instructors/' . $ins->image) }}" 
        :href="route('admin.members.index', ['user' => $instruct->id])"
        :name="$instruct->name"
        description=""

      />
      @endif
    @endforeach
  </x-scroll.scrollbar> 




  <x-heading.sub-head>Member Plus</x-heading.sub-head>


  <x-scroll.scrollbar>

  @foreach($subscribedUsers as $subscribedUser)

<x-scroll.img-section

    img="{{ vite::asset('resources/images/profile.png') }}"
    :href="route('admin.members.show',['user' => $subscribedUser->id])" 
    :name="$subscribedUser->name"
    description=""
  />

@endforeach

</x-scroll.scrollbar>






<x-heading.sub-head> Guest Mode</x-heading.sub-head>
<x-scroll.scrollbar>

  @foreach($unsubscribedUsers as $unsubscribedUser)

<x-scroll.img-section
    img="{{ vite::asset('resources/images/profile.png') }}"
    :href="route('admin.members.show2',['user' => $unsubscribedUser->id])"
    :name="$unsubscribedUser->name"
    description=""
  />
@endforeach

</x-scroll.scrollbar>





    </div>
</div>
    @endsection