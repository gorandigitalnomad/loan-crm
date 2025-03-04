<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Edit Cash Loan</h2>
                <div class="flex gap-4">
                    <form action="{{ route('clients.cash-loan.destroy', $client) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Are you sure you want to delete this loan?')">
                            Delete Loan
                        </button>
                    </form>
                    <a href="{{ route('clients.edit', $client) }}" class="text-[#1C604A] hover:text-[#123328]">
                        Back to Client
                    </a>
                </div>
            </div>

            <form action="{{ route('clients.cash-loan.update', $client) }}" method="POST" class="max-w-2xl">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="loan_amount" class="block text-sm font-medium text-gray-700">Loan Amount</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="loan_amount" id="loan_amount" step="0.01" min="0"
                                class="pl-7 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('loan_amount', $cashLoan->loan_amount) }}" required>
                        </div>
                        @error('loan_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">
                            Update Cash Loan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>