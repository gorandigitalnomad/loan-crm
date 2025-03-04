<x-app-layout>
    <div class="bg-[#123328] overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-[#123328] border-b border-gray-200">
            <h2 class="text-2xl font-semibold mb-6 text-[#ECD0AB]">Dashboard</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-[#ECD0AB] p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Total Clients</h3>
                    <p class="text-3xl font-bold">{{ $totalClients }}</p>
                </div>
                
                <div class="bg-[#DDE1D4] p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Cash Loans</h3>
                    <p class="text-3xl font-bold">{{ $activeCashLoans }}</p>
                </div>
                
                <div class="bg-[#609080] p-6 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">Home Loans</h3>
                    <p class="text-3xl font-bold">{{ $activeHomeLoans }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
