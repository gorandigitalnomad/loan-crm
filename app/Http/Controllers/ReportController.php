<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ReportService;
use App\Services\CsvExportService;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    protected $reportService;
    protected $csvExportService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReportService $reportService, CsvExportService $csvExportService)
    {
        $this->reportService = $reportService;
        $this->csvExportService = $csvExportService;
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
        
        return view('reports.index', $data);
    }
    
    /**
     * Export the loans report as a CSV file.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export(): StreamedResponse
    {
        $adviser = auth()->user();
        $data = $this->reportService->getExportData($adviser);
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $adviser->first_name . '-' . $adviser->last_name . '-loans-report-' . date('Y-m-d') . '.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = $this->csvExportService->generateLoanReport($data);

        return response()->stream($callback, 200, $headers);
    }
}
