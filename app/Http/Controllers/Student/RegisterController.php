<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create(){
        return view("auth.register");
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "string", Password::min(6)] ]);

 $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), 
            'role' => 'student',
        ]);

      

        Auth::login($user);
        return redirect("/browse");
    }
}
