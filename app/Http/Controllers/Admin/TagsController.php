<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Tag;
use App\Services\CommonDataService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index(Tag $tag)
    {
        $data = $this->commonDataService->getCommonData();
        
        $categories = $tag->categories;
        
        return view("admin.topic.index", array_merge($data, compact('tag', 'categories')));
    }

    public function create(Tag $tag){
    //     $tag = Tag::where("id",$id)->firstOrFail(); 
        return view("admin.topic.create",compact("tag"));
    }

    public function store(Request $request,Tag $tag)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);



        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            
            $imageUrl = asset('storage/' . $imagePath);
            
            $validated['image'] = $imageUrl;
        }
    
       
        $category = Category::create($validated);

         $category->tags()->attach("tag");

        return redirect()->route('admin.topics.index',
        ["tag"=>$tag]);
    }

    public function show(category $category)
    {

       // $category = Category::with('courses.tags')->findOrFail($catId);
    
        $courses = $category->courses;

    
        return view("admin.topic.show",
         compact("category", "courses") );
    }



    
public function edit(category $category)
{
   // $category = Category::with('tags')->findOrFail($catId);

  

   $selectedTags = $category->tags->pluck('category');

   $allTags = Tag::all();

    return view("admin.topic.edit", 
    compact("category",  "allTags", "selectedTags"));
}


public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    //$category = Category::findOrFail($catId);

    $category->name = $request->name;
    $category->description = $request->description;

    if ($request->hasFile('image')) {
   
        if ($category->image && \Storage::disk('public')->exists('images/' . $category->image)) {
            \Storage::disk('public')->delete('images/' . $category->image);
        }

 
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('images', $imageName, 'public');
        $category->image = $imageName;
    }

    $category->save();

    $category->tags()->sync($request->tags ?? []);
    

    return redirect()->route('admin.topics.show',$category);
}


public function add(category $category)
{
    //$category = Category::with('courses')->findOrFail($catId);
    $allCourses = Course::all();
    $selectedCourses = $category->courses->pluck('category'); 

    return view("admin.topic.add", compact('category', 'allCourses', 'selectedCourses'));
}

public function added(Request $request, Category $category)
{

   // $category = Category::findOrFail($catId);

    $courseIds = $request->input('courses', []);

    $category->courses()->sync($courseIds);


    return redirect()->route('admin.topics.show');

}

}
