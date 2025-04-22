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
    public function index($tagName = null)
    {
        $data = $this->commonDataService->getCommonData();

        

        if ($tagName) {


            $tag = Tag::where('name',$tagName)->firstOrFail();
            $categories =$tag->categories()->get(); 


            // $data['categories'] = Category::with(['courses' => function ($query) use ($tagName) {
            //     $query->whereHas('tags', function ($q) use ($tagName) {
            //         $q->where('name', $tagName);
            //     });
            // }])->get();
        }
        else {
            $categories = category::all(); 
        }
    
        $courses = collect(); 

  return view('student.browse.index',array_merge($data, compact('categories','courses')));
 // return redirect()->to(route('topics', ['categoryName' => $category->name]) . '#courses');
    }
  
    


    
    public function show($categoryName = null)
    
    {
        
        $data = $this->commonDataService->getCommonData();
        
        $courses = collect(); 
        
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->firstOrFail();
           $courses = $category->courses()->get();



        
        } 

     
      return view('student.browse.index', array_merge($data, compact('courses')));
    //  return redirect()->to(route('topics', ['categoryName' => $category->name]) . '#courses'); 
    
    }











    public function show2($id)
{
    $instructor = Instructor::with(['user.courses'])->where('user_id', $id)->firstOrFail();
$courses = $instructor->user->courses;

    return view('student.browse.instructor', compact('instructor','courses'));
}  






public function show3(){

    
    $data = $this->commonDataService->getCommonData();

    return view('student.browse.all_instructor',$data);
}

}

