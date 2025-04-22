<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
       
       $this->call([

        UserSeeder::class,
        InstructorsTableSeeder::class,
        CategoriesTableSeeder::class,
        CoursesTableSeeder::class,
        LessonsTableSeeder::class,
        TagTableSeeder::class,
        BackfillCourseSlugsSeeder::class,
        Commentsseeder::class,
        
    ]);

    }

    
}