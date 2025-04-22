<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Instructor;
use App\Models\Message;
use App\Models\Tag;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class CommonDataService
{
    public function getCommonData()
    {
        return [
            'tags' => Tag::with("courses")->get(),
            'lessons' => Lesson::all(),
            'courses' => Course::with('lessons')->where('status', '1')->get(),
            'unapprovedCourses' =>Course::where('status', '0')->get(),
            "categories" => Category::with('courses')->get(),
            "instructors" => Instructor::all(),
            "users" => User::all(),
            'students' => User::where('role', 'student')->get(),
            'instructor' => User::where('role', 'instructor')->get(),
            'admins' => User::where('role', 'admin')->get(),
            'messages' => Message::all(),
            'need_to_fix' =>Message::where('is_read','0'),
            'fixed' => Message::where('is_read','1'),
        ];
    }
}
