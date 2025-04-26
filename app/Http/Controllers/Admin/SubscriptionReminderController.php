<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionReminderController extends Controller
{
  

public function send(Request $request, $id)
{
    $request->validate([
        'description' => 'required|string|max:1000',
    ]);
    $user = User::findOrFail($id);

    $description = $request->input('description');
    $plans = Plan::all();

    Mail::to($user->email)->send(new \App\Mail\SubscriptionReminderMail($description,$plans,$user));

    return back()->with('success', 'Reminder sent successfully!');
}

}
