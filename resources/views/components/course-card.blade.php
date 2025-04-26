


<div class="p-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-10"> 

                <x-scroll.section  
                :href="route('series',  $course)" 
                :title="$course->title"
                img="{{ asset('storage/random_course/four.webp') }}"
                >
            </x-scroll.section>

</div>

</div>

