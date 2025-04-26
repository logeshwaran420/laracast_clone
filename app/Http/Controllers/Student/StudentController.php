<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;


use App\Models\Subscription;
use App\Services\CommonDataService;
use Carbon\Carbon;
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
        // dd([
        //     'now' => Carbon::now('UTC')->toDateTimeString(),
        //     'ends_at' => '2025-04-24 15:00:36',
        //     'compare' => Carbon::now('UTC')->gt(Carbon::parse('2025-04-24 15:00:36'))
        // ]);

        // $subscriptions = Subscription::where('starts_at', '<', now())->get();
        // dd($subscriptions);

        // $expiredSubscriptions = Subscription::where('ends_at', '<', Carbon::now())->get();
        // dd($expiredSubscriptions);

        return view('student.welcome',$data);
    }
}
