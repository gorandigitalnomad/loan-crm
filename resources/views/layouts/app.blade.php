<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loan CRM') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
    @auth
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">
                            {{ config('app.name', 'Loan CRM') }}
                        </a>
                    </div>
                    
                    <div class="hidden sm:flex sm:items-center sm:space-x-8 flex-1 justify-center">
                        <a href="{{ route('dashboard') }}" 
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('clients.index') }}" 
                           class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                            Clients
                        </a>
                        <a href="{{ route('reports.index') }}" 
                           class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                            Reports
                        </a>
                    </div>

                    <div class="flex items-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endauth

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>
</body>
</html>
