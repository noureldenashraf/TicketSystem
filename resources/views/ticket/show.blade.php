@extends("main")

@section("body")
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-2xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tickets</h1>
        <!-- Tickets Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-3">ID</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Created At</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
                </thead>
                    <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{$ticket->id}}</td>
                        <td class="p-3"><span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Open</span></td>
                        <td class="p-3">2025-09-01</td>
                        <td class="p-3 text-right space-x-2">
                            <a href="{{ route('ticket.show', $ticket->id) }}">
                                <button class="px-3 py-1 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600">View</button>
                            </a>

                            <button class="px-3 py-1 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>
@endsection
