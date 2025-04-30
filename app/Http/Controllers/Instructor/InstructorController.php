<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Services\CommonDataService;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function dashboard()
    {
        $user = auth()->user();
        $courses = $user->courses()->with('lessons')->orderBy("shorts")->get();
        
        $messages = Message::where('receiver_id', $user->id)->latest()->get();
        $fixedCount = $messages->where('is_read', '1')->count();      // Count of read messages
$needToFixCount = $messages->where('is_read', '0')->count(); 
    
        return view('instructor.dashboard', compact('courses', 'user','messages','fixedCount','needToFixCount'));
    }

    public function library()
    {
        $user = auth()->user();
       $courses = $user->courses;
    
        return view('instructor.library.index', compact('courses', 'user'));
    }


    public function user() {
        $user = auth()->user();

      
        $instructor = $user->instructor; 

       

        return view('instructor.user.index', compact('instructor'));
    }
    public function message()
    {
        $user = auth()->user();
        $messages = $user->receivedMessages()->latest()->with('sender')->get();
       
    $fixedCount = $messages->where('is_read', '1')->count();
    $needToFixCount = $messages->where('is_read', '0')->count();
    
        return view('instructor.message.index', compact('user', 'messages'));
    }
}
