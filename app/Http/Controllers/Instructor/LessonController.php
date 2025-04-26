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
//    public function create(course $course)
// {
//    // $course = Course::where('slug', $slug)->firstOrFail();

//     return view('instructor.lesson.create', compact('course'));
// }
public function create(Course $course)
{
    return view('instructor.lesson.create', compact('course'));
}

// public function store(Request $request,course $course)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'video' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
//     ]);

//     //$course = Course::where('slug', $slug)->firstOrFail();

//     $path = $request->file('video')->store('videos', 'public');

//     // Extract just the filename without extension or folder
//     $filename = pathinfo($path, PATHINFO_FILENAME);


//     $position = Lesson::where('course_id', $course->id)->max('position') + 1;


//     Lesson::create([
//         'title' => $request->title,
//         'description' => $request->description,
//         'video_url' => $filename,
//         'position' => $position,
//         'course_id' => $course->id,
//     ]);

//     return redirect()->route('instructor.courses.show',
//      ['slug' => $course->slug]);
// }

public function store(Request $request, Course $course)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'video' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
    ]);

    $path = $request->file('video')->store('videos', 'public');
    $filename = pathinfo($path, PATHINFO_FILENAME);

    $position = Lesson::where('course_id', $course->id)->max('position') + 1;

    Lesson::create([
        'title' => $request->title,
        'description' => $request->description,
        'video_url' => $filename,
        'position' => $position,
        'course_id' => $course->id,
    ]);

    return redirect()->route('instructor.courses.show', $course);
}

// public function show(course $course, lesson $lesson)
// {
    
//     //$course = Course::where('slug', $slug)->firstOrFail();

//     $lesson = Lesson::where('id', $id)
//                     ->where('course_id', $course->id)
//                     ->firstOrFail();

//     return view('instructor.lesson.show', compact('course', 'lesson'));
// }
public function show(Course $course, Lesson $lesson)
{
   // $this->authorize('view', $lesson);

    if ($lesson->course_id !== $course->id) {
        abort(404);
    }

    return view('instructor.lesson.show', compact('course', 'lesson'));
}

public function edit(course $course,lesson $lesson){

   // $course = Course::where('slug', $slug)->firstOrFail();
   // $lesson = Lesson::findOrFail($id);
   
    return view('instructor.lesson.edit', compact('lesson','course'));

}


// public function update(Request $request,course $course,lesson $lesson)
// {
//     $course = Course::where('slug', $slug)->firstOrFail();
//     $lesson = Lesson::where('id', $id)->where('course_id', $course->id)->firstOrFail();

//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//        'position' => ['required','integer','min:1',
//         Rule::unique('lessons')
//         ->where('course_id', $course->id)
//         ->ignore($lesson->id),],

//         'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
//     ]);

//    $upd = $request->only(['title', 'description', 'position']);

//     if ($request->hasFile('video')) {
//         $path = $request->file('video')->store('videos', 'public');
//         $lesson->video_url = basename($path); 
//     }

//     $lesson->update($upd);

//     return redirect()->route('instructor.lessons.show', [$course->slug, $lesson->id]);
    
// }

public function update(Request $request, Course $course, Lesson $lesson)
    {
        //$this->authorize('update', $lesson);

        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'position' => [
                'required', 'integer', 'min:1',
                Rule::unique('lessons')->where('course_id', $course->id)->ignore($lesson->id),
            ],
            'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:512000',
        ]);

        $data = $request->only(['title', 'description', 'position']);

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $lesson->video_url = basename($path);
        }

        $lesson->update($data);

        return redirect()->route('instructor.lessons.show', [$course, $lesson]);
    }


// public function destroy($slug,$id){

//     $course = Course::where('slug', $slug)->firstOrFail();
//     $lesson = Lesson::findOrFail($id);

//     // Delete the video file if it exists
//     if ($lesson->video_url && Storage::disk('public')->exists('videos/' . $lesson->video_url)) {
//         Storage::disk('public')->delete('videos/' . $lesson->video_url);
//     }

//     $lesson->delete();

//     return redirect()->route('instructor.courses.show', $course->slug);

// }

public function destroy(Course $course, Lesson $lesson)
    {
        //$this->authorize('delete', $lesson);

        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        if ($lesson->video_url && Storage::disk('public')->exists('videos/' . $lesson->video_url)) {
            Storage::disk('public')->delete('videos/' . $lesson->video_url);
        }

        $lesson->delete();

        return redirect()->route('instructor.courses.show', $course);
    }




}
