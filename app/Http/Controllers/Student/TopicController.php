<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CommonDataService;

class TopicController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }

    public function index($tagName = null)
    {
        $data = $this->commonDataService->getCommonData();

        if ($tagName) { 
            $data['categories'] = Category::with(['courses' => function ($query) use ($tagName) {
                $query->whereHas('tags', function ($q) use ($tagName) {
                    $q->where('name', $tagName); // Changed 'slug' to 'name'
                                });
            }])->get();
        } else {
            $data['categories'] = Category::with('courses')->get();
        }   
    // dd($data);
        return view('topics.index', $data);
    }
}
