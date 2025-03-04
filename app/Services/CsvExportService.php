<?php

namespace App\Services;

use App\Models\Adviser as User;

class CsvExportService
{
    public function generateLoanReport(array $data): callable
    {
        return function() use ($data) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for proper Excel encoding
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Write headers
            fputcsv($file, [
                'Report Date: ' . date('Y-m-d'),
                '',
                '',
                ''
            ]);
            
            fputcsv($file, [
                'Adviser: ' . $data['adviser']->first_name . ' ' . $data['adviser']->last_name,
                '',
                '',
                ''
            ]);
            
            // Portfolio Summary
            fputcsv($file, ['']);
            fputcsv($file, ['Portfolio Summary']);
            fputcsv($file, [
                'Total Clients',
                'Active Cash Loans',
                'Active Home Loans',
                'Total Loan Value'
            ]);
            fputcsv($file, [
                $data['totalClients'],
                $data['activeCashLoans'],
                $data['activeHomeLoans'],
                number_format($data['totalLoanValue'], 2)
            ]);
            
            // Loans Report
            fputcsv($file, ['']);
            fputcsv($file, ['Loans Report']);
            fputcsv($file, [
                'Product Type',
                'Client Name',
                'Product Value',
                'Creation Date'
            ]);
            
            foreach ($data['loans'] as $loan) {
                fputcsv($file, [
                    $loan['type'],
                    $loan['client_name'],
                    number_format($loan['value'], 2),
                    $loan['created_at']->format('Y-m-d')
                ]);
            }

            fclose($file);
        };
    }
}
