<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\InstructorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
   
    protected $policies = [
        
       
        Course::class => CoursePolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        \App\Models\User::class => \App\Policies\StudentPolicy::class,

    ];

         public function boot()
    {
        $this->registerPolicies();


    }
}
