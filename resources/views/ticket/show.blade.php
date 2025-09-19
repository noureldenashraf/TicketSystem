@extends("main")

@section("body")
    <div class="w-full max-w-6xl mx-auto bg-white shadow-2xl rounded-2xl p-8">
        <!-- Title -->
        <h1 class="text-3xl font-extrabold mb-8 text-gray-900 border-b pb-4">🎟️ Ticket Details</h1>

        <!-- Tickets Table -->
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm mb-8">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <th class="p-4 font-semibold">Ticket ID</th>
                    <th class="p-4 font-semibold">User ID</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold">Ticket Text</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                    <th class="p-4 font-semibold text-right"></th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4">{{$ticket->id}}</td>
                    <td class="p-4">{{$ticket->user_id}}</td>
                    <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm
                                {{ $ticket->open ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $ticket->open ? 'Open' : 'Closed' }}
                            </span>
                    </td>
                    <td class="p-4 text-gray-700">{{$ticket->ticket_text}}</td>
                    <td class="p-4 text-right">
                    <a href="{{ route('ticket.edit', $ticket->id) }}"
                       class="px-4 py-2 text-sm bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
                        Edit
                    </a>
                    </td>
                    <td class="p-4 text-right">
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-4 py-2 text-sm bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Add Comment -->
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8 shadow-sm">
            <form action="{{ route('ticket.comment',$ticket->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="comment_text" class="block text-sm font-semibold text-blue-900 mb-2">Add Comment</label>
                    <textarea id="comment_text" name="comment_text" rows="4" required
                              class="w-full p-3 border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none resize-none"></textarea>
                </div>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">
                    Submit
                </button>
            </form>
        </div>

        <!-- Comments Section -->
        <div class="space-y-4">
            <h2 class="text-xl font-bold text-gray-800 mb-4">💬 Comments</h2>
            @forelse($comments as $comment)
                <div class="bg-gray-50 border border-gray-200 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                    <p class="text-gray-700 mb-2">{{$comment->comment_text}}</p>
                    <div class="flex justify-between text-sm text-gray-500">
                        <span>Name: {{$comment->user->name}}</span>
                        <span>Date: {{$comment->created_at->format('M d, Y h:i A')}}</span>

                    </div>
                    <div class="flex justify-between text-sm text-gray-500">
                    <span>{{$comment->user->role}}</span>
                    <span>{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                </div>
            @empty
                <p class="text-gray-500 italic">No comments yet.</p>
            @endforelse
        </div>
    <div class="mt-4">
        {{ $comments->links() }}
    </div>
@endsection
