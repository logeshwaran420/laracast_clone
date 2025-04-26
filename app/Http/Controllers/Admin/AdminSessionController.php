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
   
    $attributes = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    
    if (Auth::guard('admin')->attempt($attributes)) {
        $user = Auth::guard('admin')->user();

        if ($user->role === 'admin') {

            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        Auth::guard('admin')->logout();

        return back()->withErrors([
            'email' => 'Access denied. Only admins can log in here.',
        ]);
    }

   return back()->withErrors([
        'email' => 'We couldn\'t verify your credentials.',
    ]);
}



    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout(); 

        // $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/admin/login');
    }
    
    
}
