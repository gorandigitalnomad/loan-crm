<x-app-layout>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        Email Address
                    </label>
                    <input type="email" name="email" id="email" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Password
                    </label>
                    <input type="password" name="password" id="password" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-[#1B6149] hover:bg-[#123328] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>