<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

   
    public function viewAny(User $user)
    {
     
    }

    public function view(User $authUser, User $user)
    {

        return $authUser->id === $user->id;
    
    }

    
    public function subscribe(User $user)
    {
        // By default, allow users to create new subscriptions (modify as needed)
        return true;
    }

   
    public function update(User $authUser, User $user)
    {
        // Only allow a user to update their own subscription
        return $authUser->id === $user->id;
    }

    
    public function cancel(User $authUser, Subscription $subscription)
    {
        return $authUser->id === $subscription->user_id;
    }
}
