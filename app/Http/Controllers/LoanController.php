<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\CashLoanRequest;
use App\Http\Requests\HomeLoanRequest;
use App\Services\CashLoanService;
use App\Services\HomeLoanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoanController extends Controller
{
    protected $cashLoanService;
    protected $homeLoanService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CashLoanService $cashLoanService,
        HomeLoanService $homeLoanService
    ) {
        $this->cashLoanService = $cashLoanService;
        $this->homeLoanService = $homeLoanService;
    }
    
    /**
     * Show the form for creating a new cash loan.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function createCashLoan(Client $client): View
    {
        return view('loans.cash.create', compact('client'));
    }
    
    /**
     * Show the form for creating a new home loan.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function createHomeLoan(Client $client): View
    {
        return view('loans.home.create', compact('client'));
    }
    
    /**
     * Store a newly created cash loan in storage.
     *
     * @param  \App\Http\Requests\CashLoanRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCashLoan(CashLoanRequest $request, Client $client): RedirectResponse
    {
        $this->cashLoanService->createOrUpdateCashLoan($client, $request->validated());

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Cash loan created successfully.');
    }
    
    /**
     * Store a newly created home loan in storage.
     *
     * @param  \App\Http\Requests\HomeLoanRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeHomeLoan(HomeLoanRequest $request, Client $client): RedirectResponse
    {
        $this->homeLoanService->createOrUpdateHomeLoan($client, $request->validated());

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Home loan created successfully.');
    }
    
    /**
     * Show the form for editing the specified cash loan.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editCashLoan(Client $client): View|RedirectResponse
    {
        $cashLoan = $this->cashLoanService->getCashLoan($client);
        
        if (!$cashLoan) {
            return redirect()->route('clients.edit', $client)
                ->with('error', 'Cash loan not found.');
        }

        return view('loans.cash.edit', compact('client', 'cashLoan'));
    }
    
    /**
     * Show the form for editing the specified home loan.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editHomeLoan(Client $client): View|RedirectResponse
    {
        $homeLoan = $this->homeLoanService->getHomeLoan($client);
        
        if (!$homeLoan) {
            return redirect()->route('clients.edit', $client)
                ->with('error', 'Home loan not found.');
        }

        return view('loans.home.edit', compact('client', 'homeLoan'));
    }
    
    /**
     * Update the specified cash loan in storage.
     *
     * @param  \App\Http\Requests\CashLoanRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCashLoan(CashLoanRequest $request, Client $client): RedirectResponse
    {
        $this->cashLoanService->updateCashLoan($client, $request->validated());

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Cash loan updated successfully.');
    }
    
    /**
     * Update the specified home loan in storage.
     *
     * @param  \App\Http\Requests\HomeLoanRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateHomeLoan(HomeLoanRequest $request, Client $client): RedirectResponse
    {
        $this->homeLoanService->updateHomeLoan($client, $request->validated());

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Home loan updated successfully.');
    }
    
    /**
     * Remove the specified cash loan from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyCashLoan(Client $client): RedirectResponse
    {
        $this->cashLoanService->deleteCashLoan($client);

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Cash loan deleted successfully.');
    }
    
    /**
     * Remove the specified home loan from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyHomeLoan(Client $client): RedirectResponse
    {
        $this->homeLoanService->deleteHomeLoan($client);

        return redirect()
            ->route('clients.edit', $client)
            ->with('success', 'Home loan deleted successfully.');
    }
}
