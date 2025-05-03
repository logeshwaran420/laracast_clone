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
     
        $attributes = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
    
        if (Auth::attempt($attributes)) {
            $user = Auth::user();
    
       
            if ($user->role === 'student') {
                return redirect('/browse');
            }
       
    

            return back()->withErrors([
                'email' => 'Access denied. Only students can log in here.',
            ]) ->with('_modal', 'authentication-modal')->withInput();
            
        }
    
       
        return back()->withErrors([
            'email' => 'We couldn\'t verify your credentials.',
        ])->with('_modal', 'authentication-modal')->withInput();
    }
    

    public function destroy()
    {
       Auth::logout();
       return redirect('/')->with('authentication-modal', true);
    }









}