<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex min-h-screen bg-gray-100" x-data="{ sidebarOpen: true }">
            <div class="">
                <!-- Side Navigation Bar -->
                <div class="fixed inset-y-0 left-0 z-30 flex">
                    <!-- Sidebar -->
                    <div class="bg-gray-800 text-white w-64 transition-all duration-300 ease-in-out" :class="{ 'w-16': !sidebarOpen }">
                        <!-- Toggle Button -->
                        <div class="flex justify-end p-4">
                            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-400 hover:text-white focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation Links -->
                        <nav class="mt-4">
                            <a href="{{ route('dashboard') }}" class="flex items-center p-2 hover:bg-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span x-show="sidebarOpen" class="ml-2">Dashboard</span>
                            </a>
                            <a href="#" class="flex items-center p-2 hover:bg-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span x-show="sidebarOpen" class="ml-2">Loans</span>
                            </a>
                            <a href="#" class="flex items-center p-2 hover:bg-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span x-show="sidebarOpen" class="ml-2">Apply for Loan</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="">
                <!-- Main Content -->
                <div class="ml-64 transition-all duration-300 ease-in-out" :class="{ 'ml-16': !sidebarOpen }">
                    <!-- Top Navigation Bar -->
                    @include('layouts.navigation')

                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                <!-- {{ $header }} -->
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <main>
                        <!-- {{ $slot }} -->
                    </main>
                </div>
            </div>
        </div>

        <!-- Flowbite JS -->
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>