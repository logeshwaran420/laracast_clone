<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Services\CommonDataService;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }

    public function index()
    {
        $data = $this->commonDataService->getCommonData();
        $tags = $data['tags'];
    
        $randomTag = $tags->random();
        $randomCategory = $randomTag->categories->random();
    
        $randomCourse = $randomCategory
            ? $randomCategory->courses->where('status', 1)->random()
            : null;
    
        return view('student.series.index', array_merge($data, compact(
            'randomTag',
            'randomCategory',
            'randomCourse'
        )));
    }
    
    public function show($slug = null)
{
    $data = $this->commonDataService->getCommonData();

    if ($slug) {
        $course = Course::where('slug', $slug)->firstOrFail();
        $lessons = $course->lessons;
    } else {
        $lessons = collect();
    }   
    
    $instructors = $course->instructor;
    $instructor = $instructors->instructor;


    return view("student.series.show", compact('lessons', 'course','instructors','instructor'));
}



public function showEpisode($slug = null, $position = null)
{
    $data = $this->commonDataService->getCommonData();

    // Eager load the user and the instructor from the user
    $course = Course::with(['user.instructor'])
                    ->where('slug', $slug)
                    ->firstOrFail();


    $lessons = $course->lessons()->orderBy('position')->get();

    $currentLesson = $course->lessons()->where('position', $position)->first();

    $comments = $currentLesson ? $currentLesson->comments()->with('user')->get() : collect();

    return view("student.series.episode", array_merge($data, compact(
        'course',
        'lessons',
        'currentLesson',
        'comments'
    )));
}



    public function comment_store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'lesson_id' => 'required|exists:lessons,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Comment::create([
            'body' => $request->body,
            'lesson_id' => $request->lesson_id,
            'user_id' => $request->user_id,
        ]);

        return back();
    }



    
    public function comment_destroy($slug, $position)
    {
    
    
        $comment = Comment::findOrFail($position);
        $comment->delete();
        return back();
    }

    public function warning($slug = null, $position = null){

        $data = $this->commonDataService->getCommonData();

        if ($slug) {
            $course = Course::where('slug', $slug)->firstOrFail();
            $lessons = $course->lessons;
        } else {
            $lessons = collect();
        }
        return view("student.series.warning", compact('lessons', 'course'));
    }
}