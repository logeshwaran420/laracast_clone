<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Message;
use App\Services\CommonDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CourseViewController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index(course $course){

       // $course = Course::with("lessons")->where('slug', $slug)->firstOrFail();
        $lessons = $course->lessons;

       

        return view("admin.course.index",compact("course","lessons"));
    }


    public function toggleStatus(course $course)
    {
        //$course = Course::where('slug', $slug)->firstOrFail();
    
        $course->status = $course->status ? 0 : 1;
        $course->save();
        
        Message::where('course_id', $course->id)->delete();
    
        return back();
    }

    public function message(course $course){

       // $course = Course::where('slug', $slug) // Eager load the user (instructor) relationship
        //->firstOrFail();

        return view("admin.course.message",compact("course"));

    }

    public function msgStore(Request $request,course $course)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string', 
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);
    
      //  $course = Course::where('slug', $slug)->firstOrFail();
    
        if ($course->id != $request->course_id) {
            abort(400, 'Course mismatch.');
        }
    
        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'course_id' => $request->course_id,
        ]);


        Mail::to($message->course->user)->send(
new \App\Mail\Message($message)

        );
    
        return redirect()->route('admin.courses.index', $course);
    }
    





















    public function sort()
    {
         $data = $this->commonDataService->getCommonData();


         $courses = $data['courses']->sortBy('shorts');
    
    
        return view("admin.course.sort", compact('courses'));
    }


public function sortUpdate(Request $request)
{
    $shorts = array_filter($request->input('shorts'));

  
    if (count($shorts) !== count(array_unique($shorts))) {
        return back()->withErrors(['shorts' => 'Sort numbers must be unique.'])->withInput();
    }


    $values = array_values($shorts);
    sort($values);
    foreach ($values as $i => $v) {
        if ($v != $i + 1) {
            return back()->withErrors(['shorts' => 'Sort numbers must start from 1 without gaps.'])
            ->withInput();
        }
    }

    foreach ($shorts as $id => $value) {
       Course::where('id', $id)->update(['shorts' => $value]);
    }


    return redirect()->route('admin.series');
}
}
