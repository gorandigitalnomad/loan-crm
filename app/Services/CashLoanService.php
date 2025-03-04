<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\CashLoanRepository;

class CashLoanService
{
    protected $repository;
    
    public function __construct(CashLoanRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getCashLoan(Client $client)
    {
        return $this->repository->findByClient($client);
    }
    
    public function createOrUpdateCashLoan(Client $client, array $data)
    {
        return $this->repository->createOrUpdate($client, $data);
    }
    
    public function updateCashLoan(Client $client, array $data)
    {
        return $this->repository->update($client, $data);
    }
    
    public function deleteCashLoan(Client $client)
    {
        return $this->repository->delete($client);
    }
}