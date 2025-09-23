@extends("main")

@section("body")
    <div class="w-full max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 ring-1 ring-gray-200 dark:ring-gray-700">
        <!-- Title -->
        <h2 class="text-4xl font-extrabold mb-10 text-gray-900 dark:text-gray-100 tracking-wide border-b pb-6 flex items-center">
            <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Update Ticket
        </h2>

        <!-- Ticket Update Form -->
        <form action="{{ route('ticket.update',$ticket->id) }}" method="POST" class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-700 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 space-y-6">
            @csrf
            @method('PUT')

            <!-- Ticket Text -->
            <div>
                <label for="ticket_text" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Ticket Text</label>
                <textarea id="ticket_text" name="ticket_text" rows="8" required
                          class="w-full p-4 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 outline-none resize-none bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm">{{$ticket->ticket_text}}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-7 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Submit Update
                </button>
            </div>
        </form>
    </div>
@endsection
