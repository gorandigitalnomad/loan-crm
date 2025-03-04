<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\HomeLoanRepository;

class HomeLoanService
{
    protected $repository;
    
    public function __construct(HomeLoanRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getHomeLoan(Client $client)
    {
        return $this->repository->findByClient($client);
    }
    
    public function createOrUpdateHomeLoan(Client $client, array $data)
    {
        return $this->repository->createOrUpdate($client, $data);
    }
    
    public function updateHomeLoan(Client $client, array $data)
    {
        return $this->repository->update($client, $data);
    }
    
    public function deleteHomeLoan(Client $client)
    {
        return $this->repository->delete($client);
    }
}