<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function show(Message $message){

      //  $message = Message::findOrFail($id);
           
           
            return view('instructor.message.show', compact('message'));
        
    }
    public function update(Message $message){
 // Find the message by ID
// $message = Message::findOrFail($id);

 $message->is_read = 1;
 $message->save();

 // Redirect back to the messages list or wherever you need to go
 return redirect()->route('instructor.message');

    }
}
