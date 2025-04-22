<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{    public function create()
    {
        return view('auth.login');
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
    
            // Allow only students
            if ($user->role === 'student') {
                $request->session()->regenerate();
                return redirect()->intended('/browse');
            }
    
            // If role is not student, logout and show error
            Auth::logout();
            return back()->withErrors([
                'email' => 'Access denied. Only students can log in here.',
            ]);
        }
    
        // Login failed
        return back()->withErrors([
            'email' => 'We couldn\'t verify your credentials.',
        ]);
    }
    

    public function destroy()
    {
        Auth::logout();
        return redirect('login'); 
    }









}