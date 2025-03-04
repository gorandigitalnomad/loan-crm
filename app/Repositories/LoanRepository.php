<?php

namespace App\Repositories;

use App\Models\Adviser as User;

class LoanRepository
{
    public function getTotalClientsCount(User $adviser): int
    {
        return $adviser->clients()->count();
    }

    public function getActiveCashLoansCount(User $adviser): int
    {
        return $adviser->cashLoans()->count();
    }

    public function getActiveHomeLoansCount(User $adviser): int
    {
        return $adviser->homeLoans()->count();
    }

    public function getCashLoansValue(User $adviser): float
    {
        return $adviser->cashLoans()
            ->sum('loan_amount') ?? 0;
    }

    public function getHomeLoansValue(User $adviser): float
    {
        return $adviser->homeLoans()
            ->selectRaw('SUM(property_value - down_payment) as total_value')
            ->value('total_value') ?? 0;
    }
}
