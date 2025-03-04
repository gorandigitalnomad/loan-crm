<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Clients</h2>
                <a href="{{ route('clients.create') }}" class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded">
                    Add New Client
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#1B6149]">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Contact</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Cash Loan</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Home Loan</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-[#DDE7E4] uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($clients as $client)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $client->first_name }} {{ $client->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $client->email ?: $client->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($client->cashLoan)
                                        ${{ number_format($client->cashLoan->loan_amount, 2) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($client->homeLoan)
                                        ${{ number_format($client->homeLoan->property_value - $client->homeLoan->down_payment, 2) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('clients.edit', $client) }}" class="bg-[#D9A258] hover:bg-[#1B6149] text-white font-bold py-2 px-4 rounded">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>