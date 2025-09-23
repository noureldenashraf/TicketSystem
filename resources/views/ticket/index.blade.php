@extends("main")

@section("body")
    <div class="w-full max-w-6xl mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 ring-1 ring-gray-200 dark:ring-gray-700">
        <!-- Title -->
        <h1 class="text-4xl font-extrabold mb-10 text-gray-900 dark:text-gray-100 tracking-wide border-b pb-6 flex items-center">
            <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
            </svg>
            All Tickets
        </h1>

        <!-- Tickets Table -->
        <div class="overflow-x-auto rounded-2xl border border-gray-200 dark:border-gray-700 shadow-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-800 dark:to-indigo-800 text-white">
                    <th class="p-5 font-semibold text-sm uppercase tracking-wider">ID</th>
                    <th class="p-5 font-semibold text-sm uppercase tracking-wider">Status</th>
                    <th class="p-5 font-semibold text-sm uppercase tracking-wider">Created At</th>
                    <th class="p-5 font-semibold text-sm uppercase tracking-wider text-right">View</th>
                    @if(auth()->check() && auth()->user()->role == "admin")
                        <th class="p-5 font-semibold text-sm uppercase tracking-wider text-right">Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                @foreach($tickets as $ticket)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                        <td class="p-5 text-gray-900 dark:text-gray-100">{{$ticket->id}}</td>
                        <td class="p-5">
                            <span class="px-4 py-2 rounded-full text-sm font-medium shadow-sm
                                {{ $ticket->open ? 'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-100' }}">
                                {{ $ticket->open ? 'Open' : 'Closed' }}
                            </span>
                        </td>
                        <td class="p-5 text-gray-600 dark:text-gray-400">{{$ticket->created_at->format('Y-m-d')}}</td>
                        <td class="p-5 text-right">
                            <a href="{{ route('ticket.show', $ticket->id) }}">
                                <button class="px-5 py-2.5 text-sm bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>
                            </a>
                        </td>
                        @if(auth()->check() && auth()->user()->role == "admin")
                            <td class="p-5 text-right">
                                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-5 py-2.5 text-sm bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-lg shadow-md hover:from-red-700 hover:to-pink-700 hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
@endsection
