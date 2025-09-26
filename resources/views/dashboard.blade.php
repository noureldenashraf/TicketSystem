<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight tracking-wide">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-3xl ring-1 ring-gray-200 dark:ring-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-8">
                        <div class="text-xl font-semibold">{{ __("You're logged in!") }}</div>

                        <a href="{{route("ticket.index")}}"
                           class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition">
                            All Tickets
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-800 dark:to-indigo-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Total Tickets</h3>
                                <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-4xl font-extrabold text-white">{{ ($allTickets) }}</p>
                            <p class="mt-1 text-sm text-blue-100">All time</p>
                        </div>

                        <div class="bg-gradient-to-r from-green-600 to-teal-600 dark:from-green-800 dark:to-teal-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Tickets This Month</h3>
                                <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-4xl font-extrabold text-white">{{$allTicketsThisMonth}}</p>
                            <p class="mt-1 text-sm text-green-100">Recent activity</p>
                        </div>

                        <div class="bg-gradient-to-r from-green-600 to-teal-600 dark:from-green-800 dark:to-teal-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Tickets in the Last Month</h3>
                                <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-4xl font-extrabold text-white">{{$allTicketsLastMonth}}</p>
                            <p class="mt-1 text-sm text-green-100">Recent activity</p>
                        </div>

                        <div class="bg-gradient-to-r from-yellow-500 to-orange-500 dark:from-yellow-700 dark:to-orange-700 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Open Tickets</h3>
                                <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-4xl font-extrabold text-white">{{ $openedTickets }}</p>
                            <p class="mt-1 text-sm text-yellow-100">Pending resolution</p>
                        </div>

                        <div class="bg-gradient-to-r from-red-600 to-pink-600 dark:from-red-800 dark:to-pink-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-white">Closed Tickets</h3>
                                <svg class="w-6 h-6 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-4xl font-extrabold text-white">{{ $closedTickets }}</p>
                            <p class="mt-1 text-sm text-red-100">Successfully resolved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
