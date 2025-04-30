<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\User;
use App\Services\CommonDataService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index(Request $request)
    {
        $data = $this->commonDataService->getCommonData();
    
        $query = Course::where('status', 1);
    
         if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('instructor', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('categories', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        $courses = $query->latest()->get();
    
        return view("student.search.index", array_merge($data, compact('courses')));
    }
    

}    
