<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ClientRepository
{
    public function getAllForAdviser(int $adviserId): Collection
    {
        return Client::where('adviser_id', $adviserId)
            ->with(['cashLoan', 'homeLoan'])
            ->latest()
            ->get();
    }
    
    public function create(array $data): Model
    {
        return Client::create($data);
    }
    
    public function update(Client $client, array $data): bool
    {
        return $client->update($data);
    }
    
    public function delete(Client $client): bool
    {
        return $client->delete();
    }
}
