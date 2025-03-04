<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    protected $clientService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $clients = $this->clientService->getAllForCurrentAdviser();
        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        $this->clientService->createClient($request->validated());
        
        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $this->clientService->updateClient($client, $request->validated());
        
        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        $this->clientService->deleteClient($client);
        
        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
