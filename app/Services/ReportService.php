<?php

namespace App\Services;

use App\Models\Adviser as User;
use App\Repositories\LoanRepository;

class ReportService
{
    protected $loanRepository;

    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    private function getLoansData(User $adviser): array
    {
        $cashLoans = $adviser->cashLoans()
            ->with('client')
            ->get()
            ->map(function ($loan) {
                return [
                    'type' => 'Cash Loan',
                    'client_name' => $loan->client->first_name . ' ' . $loan->client->last_name,
                    'value' => $loan->loan_amount,
                    'created_at' => $loan->created_at
                ];
            });

        $homeLoans = $adviser->homeLoans()
            ->with('client')
            ->get()
            ->map(function ($loan) {
                return [
                    'type' => 'Home Loan',
                    'client_name' => $loan->client->first_name . ' ' . $loan->client->last_name,
                    'value' => $loan->property_value - $loan->down_payment,
                    'created_at' => $loan->created_at
                ];
            });

        return $cashLoans->concat($homeLoans)
            ->sortByDesc('created_at')
            ->values()
            ->all();
    }

    private function getSummaryData(User $adviser): array
    {
        $cashLoansValue = $this->loanRepository->getCashLoansValue($adviser);
        $homeLoansValue = $this->loanRepository->getHomeLoansValue($adviser);

        return [
            'totalClients' => $this->loanRepository->getTotalClientsCount($adviser),
            'activeCashLoans' => $this->loanRepository->getActiveCashLoansCount($adviser),
            'activeHomeLoans' => $this->loanRepository->getActiveHomeLoansCount($adviser),
            'totalLoanValue' => $cashLoansValue + $homeLoansValue,
        ];
    }

    public function getDashboardData(User $adviser): array
    {
        return array_merge(
            $this->getSummaryData($adviser),
            ['loans' => $this->getLoansData($adviser)]
        );
    }

    public function getExportData(User $adviser): array
    {
        return array_merge(
            ['adviser' => $adviser],
            $this->getSummaryData($adviser),
            ['loans' => $this->getLoansData($adviser)]
        );
    }
}
