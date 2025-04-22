<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSessionController extends Controller
{
    
    public function create(){

        return view('auth.admin.login');
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
    
       
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
    
            Auth::logout();
            return back()->withErrors([
                'email' => 'Access denied. Only admins can log in here.',
            ]);
        }
    
        return back()->withErrors([
            'email' => 'We couldn\'t verify your credentials.',
        ]);
    }



    public function destroy()
    {
        Auth::logout();
        return redirect('admin'); 
    }

    
}
