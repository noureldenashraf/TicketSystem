@extends("main")

@section("body")
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-2xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tickets</h1>
        <!-- Tickets Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-3">Ticket ID</th>
                    <th class="p-3">User ID</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Ticket Text</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
                </thead>
                    <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{$ticket->id}}</td>
                        <td class="p-3">{{$ticket->user_id}}</td>
                        <td class="p-3">{{$ticket->open}}</td>
                        <td class="p-3">{{$ticket->ticket_text}}</td>
                        <td class="p-3 text-right space-x-2">
                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- This tells Laravel to treat it as DELETE -->
                                <button class="px-3 py-1 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>

        <form action="{{ route('comment.store',$ticket->id) }}" method="POST" style="background:#EBF4FF; padding:20px; border-radius:10px; width:400px; font-family:Arial, sans-serif; color:#1E3A8A;">
            @csrf
            <label for="ticket_text" style="font-weight:bold;">Ticket Text:</label><br>
            <textarea id="comment_text" name="comment_text" rows="5" cols="40" required
                      style="width:100%; padding:10px; border:1px solid #3B82F6; border-radius:6px; outline:none; color:#1E3A8A;"></textarea><br><br>

            <button type="submit"
                    style="background:#3B82F6; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; font-weight:bold;">
                Submit
            </button>
        </form>

    </div>
@endsection
