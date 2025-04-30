<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    

    public function edit(Instructor $instructor)
    {
        return view('instructor.user.edit', compact('instructor'));
    }

    
    public function update(Request $request, Instructor $instructor)
    {
        

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', 
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        $user = $instructor->user;

        $user->name = $request->name;
        $user->save();

        $instructor->description = $request->description;

        if ($request->hasFile('image')) {
            if ($instructor->image) {
                Storage::delete('public/instructors/' . $instructor->image);
            }

            $path = $request->file('image')->store('instructors', 'public');
            $instructor->image = basename($path);
        }

        $instructor->save();

        return redirect()->route('instructor.dashboard'); // Assuming you redirect to dashboard or profile page
    }

}




