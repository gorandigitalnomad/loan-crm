<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    protected $reportService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $adviser = auth()->user();
        $data = $this->reportService->getDashboardData($adviser);
        
        return view('dashboard', $data);
    }
}
