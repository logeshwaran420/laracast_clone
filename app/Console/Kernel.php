<?php

namespace App\Console;


use App\Models\Comment;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
            Subscription::where('ends_at', '<',Carbon::now())
                ->update(['is_active' => 0]);
              
        })->daily();


        $schedule->command('reminder:daily-subscription')->dailyAt('08:30');
    }

    
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }



}
