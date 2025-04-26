<?php


namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\CommonDataService;
use Redirect;

class BrowserController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
//     public function index($tagName = null)
//     {
//         $data = $this->commonDataService->getCommonData();
//  if ($tagName) {
//         $tag = Tag::where('name',$tagName)->firstOrFail();
//             $categories =$tag->categories()->get();  
//         }
//         else {
//             $categories = category::all(); 
//         }
//         $courses = collect(); 

//   return view('student.browse.index',array_merge($data, compact('categories','courses')));

//     }

    public function index(Tag $tag)
    {
        $data = $this->commonDataService->getCommonData();
 if ($tag) {
       
            $categories =$tag->categories()->get();  
        }
        else {
            $categories = category::all(); 
        }

       
  return view('student.browse.index',array_merge($data, compact('categories',)));

    }


    public function show(Category $category)   
    {       
        $data = $this->commonDataService->getCommonData();
        
        $courses = collect(); 
        
        if ($category) {
           $courses = $category->courses()->get();

        } 
      return view('student.browse.index', array_merge($data, compact('courses')));
    
    }
    

    // public function show($categoryName = null)   
    // {       
    //     $data = $this->commonDataService->getCommonData();
        
    //     $courses = collect(); 
        
    //     if ($categoryName) {
    //         $category = Category::where('name', $categoryName)->firstOrFail();
    //        $courses = $category->courses()->get();

    //     } 
    //   return view('student.browse.index', array_merge($data, compact('courses')));
    
    // }



public function show2(Instructor $instructor)
{
  
    $courses = $instructor->user->courses;
    return view('student.browse.instructor', compact('instructor', 'courses'));
}


public function show3(){

    
    $data = $this->commonDataService->getCommonData();

    return view('student.browse.all_instructor',$data);
}

}

