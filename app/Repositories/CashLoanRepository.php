<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\CashLoan;

class CashLoanRepository
{
    public function findByClient(Client $client): ?CashLoan
    {
        return $client->cashLoan;
    }
    
    public function createOrUpdate(Client $client, array $data): CashLoan
    {
        return $client->cashLoan()->updateOrCreate(
            ['client_id' => $client->id],
            array_merge(['adviser_id' => auth()->id()], $data)
        );
    }
    
    public function update(Client $client, array $data): bool
    {
        return $client->cashLoan()->update($data);
    }
    
    public function delete(Client $client): bool
    {
        return $client->cashLoan()->delete();
    }
}