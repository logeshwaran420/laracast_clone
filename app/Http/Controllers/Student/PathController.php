<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;;

use App\Services\CommonDataService;
use Illuminate\Http\Request;
use App\Models\Course;

class PathController extends Controller
{
 public function index()
    {
         $courses = Course::orderBy('shorts')->get();


        return view("student.path.index", compact('courses'));
    }
}
