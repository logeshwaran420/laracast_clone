<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'name' => 'forever',
                'description' => 'One-time access to all courses, forever. No expiration.',
                'duration_in_days' => null,  // Null because it never expires
            ],
            [
                'name' => 'monthly',
                'description' => 'Unlimited access for 30 days. Auto-renews monthly.',
                'duration_in_days' => 30,    // Expires after 30 days
            ],
            [
                'name' => 'yearly',
                'description' => '12 months of unlimited access with discounted pricing.',
                'duration_in_days' => 365,   // Expires after 365 days
            ],
        ]);
    }
}
