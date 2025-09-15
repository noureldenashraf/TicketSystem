@extends("main")

@section("body")
    <div class="w-full max-w-2xl mx-auto bg-white shadow-2xl rounded-2xl p-8">
        <!-- Title -->
        <h2 class="text-2xl font-extrabold text-blue-900 mb-6 border-b pb-3">✏️ Update Ticket</h2>

        <!-- Ticket Update Form -->
        <form action="{{ route('ticket.update',$ticket->id) }}" method="POST" class="bg-blue-50 border border-blue-200 rounded-xl p-6 shadow-sm space-y-4">
            @csrf
            @method('PUT')

            <!-- Ticket Text -->
            <div>
                <label for="ticket_text" class="block text-sm font-semibold text-blue-900 mb-2">Ticket Text</label>
                <textarea id="ticket_text" name="ticket_text" rows="5" required
                          class="w-full p-3 border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none resize-none text-blue-900">{{$ticket->ticket_text}}</textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
