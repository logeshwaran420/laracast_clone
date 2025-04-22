<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit($id){

        $user = auth()->user();



        $instructor = $user->instructor;
        
      


        return view("instructor.user.edit",compact("instructor"));
    }


    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $user = auth()->user();
    
       
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string|max:1000", 
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048"
        ]);
    
        $user->name = $request->name;
        $user->save();
    
        
        $instructor->description = $request->description;
        
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($instructor->image) {
                Storage::delete('public/instructors/' . $instructor->image);
            }
        
            // Store new image in 'public/instructors'
            $path = $request->file('image')->store('instructors', 'public');
            $instructor->image = basename($path); // or just use $path if you want folder included
        }
    
        $instructor->save();
    
       
        return redirect()->route('instructor.user');
    }
    


}




