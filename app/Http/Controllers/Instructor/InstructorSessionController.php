<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorSessionController extends Controller
{
    //
    public function create(){

        return view('auth.instructor.login');
    }



    
    public function store(Request $request)
    {
        // Validate login credentials
        $attributes = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
    
        if (Auth::attempt($attributes)) {
            $user = Auth::user();
    
       
            if ($user->role === 'instructor') {
                $request->session()->regenerate();
                return redirect()->intended('/instructor');
            }
    
            Auth::logout();
            return back()->withErrors([
                'email' => 'Access denied. Only instructors can log in here.',
            ]);
        }
    
        return back()->withErrors([
            'email' => 'We couldn\'t verify your credentials.',
        ]);
    }



    public function destroy()
    {
        Auth::logout();
        return redirect('instructor'); 
    }


}
