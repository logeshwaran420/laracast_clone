<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\CommonDataService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Str;

class CourseController extends Controller
{
    protected $commonDataService;                  

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index($slug = null)
    {
     
                    
    }

    public function create()
    {
        return view('instructor.course.create');
    }

    
    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

       $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'user_id' => $request->user_id,
            'shorts' => 0, // default value
            'status' => false, // default value
        ]);

        return redirect()->route('instructor.courses.show', ['course' => $course->slug]);

    }

    // public function show()
    // {
    //     $data = $this->commonDataService->getCommonData();
    
    //     $course = Course::with(['lessons' => function ($query) {
    //         $query->orderBy('position');
    //     },])->where('slug', $slug)->firstOrFail();

    //     $this->authorize('view', $course);

    //     $instructors = $course->instructor;
    //    $instructor = $instructors->instructor;
        
    //     return view('instructor.course.show', compact('course','instructor','instructors'));
    // }
    
    public function show(Course $course)
    {
        $data = $this->commonDataService->getCommonData();

        $this->authorize('view', $course);

        $instructors = $course->instructor;
        $instructor = $instructors->instructor;

        return view('instructor.course.show', compact('course', 'instructor', 'instructors'));
    }
    
    // public function edit(course $course)
    // {
    //     $data = $this->commonDataService->getCommonData();

    //     //$course = Course::where('slug', $slug)->firstOrFail();

    //     $this->authorize('update', $course);

    //     return view('instructor.course.edit', compact('course'));
    // }
    public function edit(Course $course)
    {
        $data = $this->commonDataService->getCommonData();

        $this->authorize('update', $course);

        return view('instructor.course.edit', compact('course'));
    }
    
    // public function update(Request $request, $slug)
    // {

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //     ]);
    
    //     $course = Course::where('slug', $slug)->firstOrFail();
    
      
    //     $course->update([
    //         'title' => $request->title,
    //         'slug' => Str::slug($request->title), 
    //          'description' => $request->description,
    //     ]);
    
    //     return redirect()->route('instructor.courses.show', ['slug' => $course->slug]);
    // }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        return redirect()->route('instructor.courses.show', $course->slug);
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return redirect()->route('instructor.library');
    }

//     public function destroy(course $course)
//     {
    
//     $course = Course::where('slug', $slug)->firstOrFail();

//     $this->authorize('delete', $course);

//    $course->delete();

//      return redirect()->route('instructor.library');
//     }


}
