<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Reports</h2>
                <a href="{{ route('reports.export') }}" 
                   class="inline-flex items-center px-4 py-2 bg-[#3D765F] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Export CSV
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Summary Card -->
                <div class="bg-[#DDE1D4] p-6 rounded-lg border">
                    <h3 class="text-lg font-medium mb-4">Portfolio Summary</h3>
                    <div class="space-y-2">
                        <p><span class="font-medium">Total Clients:</span> {{ $totalClients }}</p>
                        <p><span class="font-medium">Active Cash Loans:</span> {{ $activeCashLoans }}</p>
                        <p><span class="font-medium">Active Home Loans:</span> {{ $activeHomeLoans }}</p>
                        <p><span class="font-medium">Total Loan Value:</span> ${{ number_format($totalLoanValue, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Loans Report -->
            <div class="mt-12">
                <h3 class="text-lg font-bold mb-4">Loans Report</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#1B6149]">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Product Type</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Client Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Product Value</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($loans as $loan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan['type'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan['client_name'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($loan['value'], 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loan['created_at']->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
