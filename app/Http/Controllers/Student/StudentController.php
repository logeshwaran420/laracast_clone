<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use App\Services\CommonDataService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }
    public function index()
    {
        $data = $this->commonDataService->getcommondata();

        return view('student.welcome',$data);
    }
}
