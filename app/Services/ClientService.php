<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ClientService
{
    protected $repository;
    
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getAllForCurrentAdviser(): Collection
    {
        return $this->repository->getAllForAdviser(auth()->id());
    }
    
    public function createClient(array $data): Model
    {
        $data['adviser_id'] = auth()->id();
        return $this->repository->create($data);
    }
    
    public function updateClient(Client $client, array $data): bool
    {
        return $this->repository->update($client, $data);
    }
    
    public function deleteClient(Client $client): bool
    {
        return $this->repository->delete($client);
    }
}