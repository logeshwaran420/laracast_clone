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
                  ->orWhereHas('tags', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('categories', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
     if ($request->filled('tagName')) {
            $tagname = $request->input('tagName');
            $query->whereHas('tags', function ($subQuery) use ($tagname) {
                $subQuery->where('name', $tagname);
            });
        }
    
       if ($request->filled('categoryName')) {
            $categoryname = $request->input('categoryName');
            $query->whereHas('categories', function ($subQuery) use ($categoryname) {
                $subQuery->where('name', $categoryname);
            });
        }
    
       if ($request->filled('instructor')) {
            $instructorname = $request->input('instructor');
            $query->whereHas('instructor', function ($subQuery) use ($instructorname) {
                $subQuery->where('name', $instructorname);
            });
        }
    
        $courses = $query->latest()->get();
    
        return view("student.search.index", array_merge($data, compact('courses')));
    }
    
    public function getHint(Request $request)
    {
        
        $query = Course::where('status', 1);
        
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('instructor', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('tags', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('categories', function ($subQuery) use ($search) {
                      $subQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        $courses = $query->get(); 
        return response()->json([
            'courses' => $courses,
        ]);
    }
    
    
}    
