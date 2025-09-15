@extends("main")

@section("body")
    <div class="w-full max-w-6xl mx-auto bg-white shadow-2xl rounded-2xl p-8">
        <!-- Title -->
        <h1 class="text-3xl font-extrabold mb-8 text-gray-900 border-b pb-4">🎟️ All Tickets</h1>

        <!-- Tickets Table -->
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <th class="p-4 font-semibold">ID</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold">Created At</th>
                    <th class="p-4 font-semibold text-right">View</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4">{{$ticket->id}}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm
                                {{ $ticket->open ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $ticket->open ? 'Open' : 'Closed' }}
                            </span>
                        </td>
                        <td class="p-4 text-gray-600">{{$ticket->created_at->format('Y-m-d')}}</td>
                        <td class="p-4 text-right">
                            <a href="{{ route('ticket.show', $ticket->id) }}">
                                <button class="px-4 py-2 text-sm bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
                                    View
                                </button>
                            </a>
                        </td>
                        <td class="p-4 text-right">
                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 text-sm bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
