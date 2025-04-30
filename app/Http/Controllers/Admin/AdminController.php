<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscription;
use App\Models\User;
use App\Services\CommonDataService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $commonDataService;

    public function __construct(CommonDataService $commonDataService)
    {
        $this->commonDataService = $commonDataService;
    }

    public function index()
    {
        $data = $this->commonDataService->getCommonData();
        return view('admin.dashboard', $data);
    }

    public function series()
    {
        $data = $this->commonDataService->getCommonData();
        return view('admin.series', $data);
    }

    public function tracks()
    {
        $data = $this->commonDataService->getCommonData();
        return view('admin.tracks', $data);
    }

    public function members()
    {
        $data = $this->commonDataService->getCommonData();

        $unsubscribedUsers = User::where('role', 'student')
            ->whereDoesntHave('subscriptions', function ($query) {
                $query->where('is_active', 1);
            })
            ->get();

        $subscribedUsers = User::where('role', 'student')
            ->whereHas('subscriptions', function ($query) {
                $query->where('is_active', 1);
            })
            ->get();

        $data['unsubscribedUsers'] = $unsubscribedUsers;
        $data['subscribedUsers'] = $subscribedUsers;

        return view('admin.members', $data);
    }

    public function search(Request $request)
    {
        $data = $this->commonDataService->getCommonData();

        $query = Course::where('status', 1);

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                 ->orWhereHas('instructor', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%{$search}%");
                    })->orWhereHas('categories', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $courses = $query->latest()->get();

        return view('admin.search.index', array_merge($data, compact('courses')));
    }
}
