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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('instructor.courses.show', ['slug' => $course->slug]);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug = null)
    {
        $data = $this->commonDataService->getCommonData();
    
        $course = Course::with(['lessons' => function ($query) {
            $query->orderBy('position');
        },])->where('slug', $slug)->firstOrFail();

        $instructors = $course->instructor;
       $instructor = $instructors->instructor;
        
        return view('instructor.course.show', compact('course','instructor','instructors'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = $this->commonDataService->getCommonData();

        $course = Course::where('slug', $slug)->firstOrFail();
        return view('instructor.course.edit', compact('course'));
    }

    
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Find the course by slug
        $course = Course::where('slug', $slug)->firstOrFail();
    
        // Update the course data
        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Ensure the slug is updated
            'description' => $request->description,
        ]);
    
        // Redirect to the course index or another page
        return redirect()->route('instructor.courses.show', ['slug' => $course->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
         // Find the course by its slug
    $course = Course::where('slug', $slug)->firstOrFail();

    // Delete the course
    $course->delete();

    // Redirect to a specific route (e.g., the index or library)
    return redirect()->route('instructor.library');
    }




}
