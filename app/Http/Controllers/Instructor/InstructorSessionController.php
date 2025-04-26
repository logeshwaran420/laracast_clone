<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorSessionController extends Controller
{
    public function create(){

        return view('auth.instructor.login');
    }
 
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::guard('instructor')->attempt($attributes)) {
            $user = Auth::guard('instructor')->user();
    
            if ($user->role === 'instructor') {
                 $request->session()->regenerate();
    
                return redirect()->intended('/instructor');
            }
    
             Auth::guard('instructor')->logout();
    
            return back()->withErrors([
                'email' => 'Access denied. Only instructors can log in here.',
            ]);
        }
    
        return back()->withErrors([
            'email' => 'We couldn\'t verify your credentials.',
        ]);
    }
    


    public function destroy(Request $request)
    {
       
        Auth::guard('instructor')->logout(); 
        
        
        // $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('instructor'); 
    }


}

