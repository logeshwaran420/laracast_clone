@extends('layout.admin')
@section('content')






    
    <x-admin.navigation />



    <x-heading.main-head :title="auth()->user()->name">
        You know the drill.
    </x-heading.main-head>


  
   

    <div class="bg-gray-900 text-white p-10">
        <div class="container mx-auto max-w-6xl">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <x-admin.metric-card  title="Total Topics" :value="$tags->count()" />
                <x-admin.metric-card   title="Total Categories" :value=" $categories->count()" />
                <x-admin.metric-card   title="Aproved Courses" :value="$courses->count()" />
                <x-admin.metric-card  title="Total Lessons" :value=" $lessons->count()" />
                <x-admin.metric-card  title="Total Instructors" :value="$instructors->count()" />
                <x-admin.metric-card   title="Total Subscriptions" :value="$students->count()" />
                <x-admin.metric-card   title="Un-Aproved Courses" :value="$unapprovedCourses->count()" />
                <x-admin.metric-card  title="Needs-To Fix" :value="$need_to_fix->count()" />
                    <x-admin.metric-card  title="Fixed" :value="$fixed->count()" />
                   

            </div>

        </div>
   </div>


 
@endsection