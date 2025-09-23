@extends("main")
@section("body")
    <div class="w-full max-w-7xl mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 ring-1 ring-gray-200 dark:ring-gray-700">
        <!-- Title -->
        <h1 class="text-4xl font-extrabold mb-10 text-gray-900 dark:text-gray-100 tracking-wide border-b pb-6 flex items-center">
            <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
            </svg>
            Ticket Details
        </h1>

        <!-- Ticket Details Card -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-10">
            <!-- Ticket Info -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Ticket Information</h2>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Ticket ID:</span>
                        <span class="text-gray-900 dark:text-gray-100">{{$ticket->id}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">User ID:</span>
                        <span class="text-gray-900 dark:text-gray-100">{{$ticket->user_id}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Status:</span>
                        <span class="px-4 py-2 rounded-full text-sm font-medium shadow-sm
                            {{ $ticket->open ? 'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-100' }}">
                            {{ $ticket->open ? 'Open' : 'Closed' }}
                        </span>
                    </div>
                    <div class="mt-4">
                        <span class="font-semibold text-gray-700 dark:text-gray-300 block mb-2">Ticket Text:</span>
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap bg-gray-100 dark:bg-gray-900 p-4 rounded-xl">{{$ticket->ticket_text}}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Actions</h2>
                <div class="space-y-4">
                    <!-- Edit button -->
                    <a href="{{ route('ticket.edit', $ticket->id) }}">
                        <button class="w-full px-5 py-3 text-sm bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Ticket
                        </button>
                    </a>

                    @if(auth()->check() && auth()->user()->role == "admin")
                        <!-- Switch Status button -->
                        <form action="{{ route('ticket.toggle', $ticket->id) }}" method="POST" class="inline-block w-full">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <button
                                class="w-full px-5 py-3 text-sm
                           {{ $ticket->open ? 'bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700' : 'bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700' }}
                           text-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                                {{ $ticket->open ? 'Close Ticket' : 'Reopen Ticket' }}
                            </button>
                        </form>

                        <!-- Delete button -->
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="inline-block w-full">
                            @csrf
                            @method('DELETE')
                            <button
                                class="w-full px-5 py-3 text-sm bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-lg shadow-md hover:from-red-700 hover:to-pink-700 hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Ticket
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Add Comment -->
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-2xl p-8 mb-10 shadow-md">
            <form action="{{ route('ticket.comment',$ticket->id) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="comment_text" class="block text-sm font-semibold text-blue-900 dark:text-blue-200 mb-3">Add Comment</label>
                    <textarea id="comment_text" name="comment_text" rows="4" required
                              class="w-full p-4 border border-blue-400 dark:border-blue-600 rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 outline-none resize-none bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"></textarea>
                </div>
                <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-7 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300">
                    Submit Comment
                </button>
            </form>
        </div>

        <!-- Comments Section -->
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
                Comments
            </h2>
            @forelse($comments as $comment)
                <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{$comment->comment_text}}</p>
                    <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                        <span>Name: {{$comment->user->name}}</span>
                        <span>Date: {{$comment->created_at->format('M d, Y h:i A')}}</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400 mt-1">
                        <span>{{$comment->user->role}}</span>
                        <span>{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400 italic">No comments yet.</p>
            @endforelse
        </div>
        <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-900 rounded-2xl">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
