<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Reply;
use App\Models\thread;
use App\Services\CommonDataService;
use Illuminate\Http\Request;
use Str;

class ThreadController extends Controller
{

    protected $commonDataService;
    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index(){
        $categories = Category::all(); 
    $threads = Thread::latest()->paginate(4); 
        
        return view("student.thread.index",compact('threads','categories'));
    }
   
    public function create(){

        $categories = Category::all(); 



        return view("student.thread.create",compact('categories'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',  // Make sure category exists
            'body' => 'required|string',
        ]);

        $slug = Str::slug($validated['title']);

        $slugCount = thread::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . ($slugCount + 1);
        }


        $thread = new Thread();
        $thread->user_id = auth()->id();
        $thread->category_id = $validated['category'];
        $thread->title = $validated['title'];
        $thread->body = $validated['body'];
        $thread->slug = $slug;
        $thread->save();

        // Redirect with a success message
        return redirect()->route('thread.index')->with
        ('success', 'Thread created successfully!');
    }



    public function channels(){
        $categories = Category::all(); 
        return view("student.thread.show",compact('categories'));
    }

      public function thread(category $category){

        $data = $this->commonDataService->getcommondata();
        $threads = $category->threads()->paginate(4);
       
      
        return view("student.thread.index", array_merge($data,compact('threads','category')));
    }
    public function show(category $category,thread $thread){

       $replies = $thread->replies;
        
       return view('student.thread.view',
       compact('category','thread',  'replies'));

    }


    public function destroy(Request $request, Category $category, Thread $thread)
    {
        $thread->delete();
    
        return redirect()->route('thread.channels.view', $category);
    }




    public function replystore(Request $request,category $category,thread $thread){

        $request->validate([
            'body' => 'required|string|max:5000',
        ]);

        Reply::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back();
    }

  
    public function replydelete(Request $request,category $category,thread $thread,reply $reply){
        $reply->delete();
        return back();
    }

}
