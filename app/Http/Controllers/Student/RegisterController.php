<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Redirect;
use Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

   
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        "name" => ["string", "max:255"],
        "email" => ["email", "unique:users,email"],
        "password" => ["string", Password::min(6)],
    ]);

    if ($validator->fails()) {
        return Redirect::back()
            ->withErrors($validator)
            ->withInput()
            ->with('_modal', 'registration-modal');
    }
    
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'student',
    ]);

    Auth::login($user);

    return redirect('/');
}


    
  
}
