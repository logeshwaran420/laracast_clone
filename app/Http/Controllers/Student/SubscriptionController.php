<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\EmailSubscription;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

   
        // public function subscription($userId)
        // {
        //     $user = User::findOrFail($userId); // This is the target user
    
        //     // This checks if the logged-in user is authorized to view this user's subscription
        //     $this->authorize('view', $user);
    
        //     $subscription = $user->subscription;
        //     $plans = Plan::all();
        //     $activePlanId = $subscription?->plan_id ?? null;
    
        //     return view('student.subscribe.index', compact('activePlanId', 'plans'));
        // }
        public function subscription(User $user)
        {
            $this->authorize('view', $user);
        
            $subscription = $user->subscription;
            $plans = Plan::all();
            $activePlanId = $subscription?->plan_id ?? null;
        
            return view('student.subscribe.index',
             compact('activePlanId', 'plans'));
        }
    

        // public function subscribe(Request $request,$userId)
        // {

        //     $user = Auth::user();
        //     $plan = Plan::find($request->plan_id);

    
        //     if (!$plan) {
        //         return redirect()->back()->with('error', 'Invalid Plan');
        //     }

        // // $this->authorize('subscribe', $plan);
        

        //     $subscription = new Subscription([
        //         'user_id' => $user->id,
        //         'plan_id' => $plan->id,
        //         'starts_at' => now(),
        //         'ends_at' => now()->addDays($plan->duration_in_days), 
        //     ]);

        //     $subscription->save();

        //     return redirect()->route('home');
        // }

    
public function subscribe(Request $request, User $user)
{
    $authUser = Auth::user();
    $plan = Plan::find($request->plan_id);

    if (!$plan) {
        return redirect()->back()->with('error', 'Invalid Plan');
    }

    $subscription = new Subscription([
        'user_id' => $authUser->id,
        'plan_id' => $plan->id,
        'starts_at' => now(),
        'ends_at' => now()->addDays($plan->duration_in_days), 
    ]);

    $subscription->save();

    return redirect()->route('home');
}




public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:email_subscriptions,email',
        ]);

      
        EmailSubscription::create([
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed!');
    }
}
