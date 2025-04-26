<?php

namespace App\Console\Commands;

use App\Mail\SubscriptionReminderMail;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class DailySubscriptionReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   


    protected $signature = 'reminder:daily-subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily subscription reminders to students who have not subscribed';

    /**
     * Execute the console command.
     *
     * @return int
     */
       public function handle()
    {
        $students = User::where('role', 'student')
        ->whereDoesntHave('subscriptions')
        ->get();

    $plans = Plan::all();
    $description = "Don't miss out on our premium content! Choose your subscription plan today.";

    foreach ($students as $student) {
        Mail::to($student->email)
        ->send(new SubscriptionReminderMail($description, $plans, $student));
    }

    
        //$this->info('Daily subscription reminders sent successfully!');


    }
}
