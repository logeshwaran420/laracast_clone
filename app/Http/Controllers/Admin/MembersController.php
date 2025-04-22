<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
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
    public function index($id)
    {
       
        $instructor = Instructor::with('user')->where('user_id', $id)->firstOrFail();
    
        $user = $instructor->user;
        $messages = $user->receivedMessages()->with('sender')->get();
    
     
        return view('admin.member.index', compact('instructor', 'messages'));
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





}
