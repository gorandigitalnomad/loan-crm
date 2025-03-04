<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Edit Client</h2>
                <div class="space-x-4">
                    <a href="{{ route('clients.index') }}" class="text-[#1C604A] hover:text-[#123328]">
                        Back to Clients
                    </a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" 
                            onclick="return confirm('Are you sure you want to delete this client?')">
                            Delete Client
                        </button>
                    </form>
                </div>
            </div>

            <form action="{{ route('clients.update', $client) }}" method="POST" class="max-w-2xl">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ old('first_name', $client->first_name) }}" required>
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ old('last_name', $client->last_name) }}" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ old('email', $client->email) }}">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="tel" name="phone" id="phone" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ old('phone', $client->phone) }}">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">
                        Update Client
                    </button>
                </div>
            </form>

            <!-- Loans Section -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Loans</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cash Loan -->
                    <div class="bg-[#ECD0AB] border rounded-lg p-6">
                        <h4 class="text-lg font-medium mb-4">Cash Loan</h4>
                        @if($client->cashLoan)
                            <div class="space-y-2">
                                <p><span class="font-medium">Amount:</span> ${{ number_format($client->cashLoan->loan_amount, 2) }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('clients.cash-loan.edit', $client) }}" 
                                        class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">Edit Cash Loan</a>
                                </div>
                            </div>
                        @else
                            <div class="text-gray-500">
                                No cash loan found.
                                <div class="mt-4">
                                    <a href="{{ route('clients.cash-loan.create', ['client' => $client]) }}" 
                                        class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">Add Cash Loan</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Home Loan -->
                    <div class="bg-[#DDE1D4] border rounded-lg p-6">
                        <h4 class="text-lg font-medium mb-4">Home Loan</h4>
                        @if($client->homeLoan)
                            <div class="space-y-2">
                                <p><span class="font-medium">Property Value:</span> ${{ number_format($client->homeLoan->property_value, 2) }}</p>
                                <p><span class="font-medium">Down Payment:</span> ${{ number_format($client->homeLoan->down_payment, 2) }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('clients.home-loan.edit', $client) }}" 
                                        class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">Edit Home Loan</a>
                                </div>
                            </div>
                        @else
                            <div class="text-gray-500">
                                No home loan found.
                                <div class="mt-4">
                                    <a href="{{ route('clients.home-loan.create', ['client' => $client]) }}" 
                                        class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">Add Home Loan</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
