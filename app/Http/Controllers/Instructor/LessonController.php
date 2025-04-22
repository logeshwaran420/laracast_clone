<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LessonController extends Controller
{
   public function create($slug)
{
    $course = Course::where('slug', $slug)->firstOrFail();

    return view('instructor.lesson.create', compact('course'));
}

public function store(Request $request, $slug)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'video' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
    ]);

    $course = Course::where('slug', $slug)->firstOrFail();

    $path = $request->file('video')->store('videos', 'public');

    // Extract just the filename without extension or folder
    $filename = pathinfo($path, PATHINFO_FILENAME);


    $position = Lesson::where('course_id', $course->id)->max('position') + 1;


    Lesson::create([
        'title' => $request->title,
        'description' => $request->description,
        'video_url' => $filename,
        'position' => $position,
        'course_id' => $course->id,
    ]);

    return redirect()->route('instructor.courses.show',
     ['slug' => $course->slug]);
}


public function show($slug, $id)
{
    
    $course = Course::where('slug', $slug)->firstOrFail();

    $lesson = Lesson::where('id', $id)
                    ->where('course_id', $course->id)
                    ->firstOrFail();

    return view('instructor.lesson.show', compact('course', 'lesson'));
}

public function edit($slug,$id){

    $course = Course::where('slug', $slug)->firstOrFail();
    $lesson = Lesson::findOrFail($id);
   
    return view('instructor.lesson.edit', compact('lesson','course'));

}


public function update(Request $request, $slug, $id)
{
    $course = Course::where('slug', $slug)->firstOrFail();
    $lesson = Lesson::where('id', $id)->where('course_id', $course->id)->firstOrFail();

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
       'position' => ['required','integer','min:1',
        Rule::unique('lessons')
        ->where('course_id', $course->id)
        ->ignore($lesson->id),],

        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
    ]);

   $upd = $request->only(['title', 'description', 'position']);

    if ($request->hasFile('video')) {
        $path = $request->file('video')->store('videos', 'public');
        $lesson->video_url = basename($path); 
    }

    $lesson->update($upd);

    return redirect()->route('instructor.lessons.show', [$course->slug, $lesson->id]);
    
}


public function destroy($slug,$id){

    $course = Course::where('slug', $slug)->firstOrFail();
    $lesson = Lesson::findOrFail($id);

    // Delete the video file if it exists
    if ($lesson->video_url && Storage::disk('public')->exists('videos/' . $lesson->video_url)) {
        Storage::disk('public')->delete('videos/' . $lesson->video_url);
    }

    $lesson->delete();

    return redirect()->route('instructor.courses.show', $course->slug);

}
}
