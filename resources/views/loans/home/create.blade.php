<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">New Home Loan</h2>
                <a href="{{ route('clients.edit', $client) }}" class="text-[#1C604A] hover:text-[#123328]">
                    Back to Client
                </a>
            </div>

            <form action="{{ route('clients.home-loan.store', $client) }}" method="POST" class="max-w-2xl">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label for="property_value" class="block text-sm font-medium text-gray-700">Property Value</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="property_value" id="property_value" step="0.01" min="0"
                                class="pl-7 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('property_value') }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="down_payment" class="block text-sm font-medium text-gray-700">Down Payment</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="down_payment" id="down_payment" step="0.01" min="0"
                                class="pl-7 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('down_payment') }}" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">
                            Create Home Loan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>