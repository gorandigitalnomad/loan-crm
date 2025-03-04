<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\HomeLoan;

class HomeLoanRepository
{
    public function findByClient(Client $client): ?HomeLoan
    {
        return $client->homeLoan;
    }
    
    public function createOrUpdate(Client $client, array $data): HomeLoan
    {
        return $client->homeLoan()->updateOrCreate(
            ['client_id' => $client->id],
            array_merge(['adviser_id' => auth()->id()], $data)
        );
    }
    
    public function update(Client $client, array $data): bool
    {
        return $client->homeLoan()->update($data);
    }
    
    public function delete(Client $client): bool
    {
        return $client->homeLoan()->delete();
    }
}