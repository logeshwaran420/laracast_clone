<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function show(Message $message){

   
     return view('instructor.message.show', compact('message'));
        
    }
    public function update(Message $message){

 $message->is_read = 1;
 $message->save();

 return redirect()->route('instructor.message');

    }
}
