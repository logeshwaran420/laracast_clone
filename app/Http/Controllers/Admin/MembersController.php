<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\CommonDataService;
use Hash;
use Illuminate\Http\Request;

class MembersController extends Controller
{

    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    
    public function index(User $user)
    {
        //$instructor = $user->instructor()->with('user')->firstOrFail();

        $instructor = $user->instructor;

        $message = $user->receivedMessages()->with('sender')->get();

       $courses = $instructor->user->courses;



        return view('admin.member.index', compact('instructor', 'message','courses'));
    }


    public function create(){

        return view('admin.member.create');
    }
    

    public function store(request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'instructor';
        $user->save();


        $instructorData = [
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->storeAs('instructors', $fileName, 'public');
            $instructorData['image'] = $fileName;
        }
        $user->instructor()->updateOrCreate(
            ['user_id' => $user->id],
            $instructorData
        );
        
        
        return redirect()->back()->with("created");
    }

    
    public function show(User $user)
    {
       
      
        $subscription = $user->subscriptions;

  


        return view('admin.member.show', compact('subscription', 'user'));
    }


    public function show2(User $user)
    {
        
        return view('admin.member.show2', compact('user'));
    }

    public function remind(){

        $plans = Plan::all(); 
        
        return view("admin.remind",compact("plans"));
    }
}
