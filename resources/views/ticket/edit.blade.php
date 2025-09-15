@extends("main")

@section("body")

    <h2 style="color:#1E3A8A; font-family:Arial, sans-serif;">Submit a Ticket</h2>

    <form action="{{ route('ticket.update',$ticket->id) }}" method="POST" style="background:#EBF4FF; padding:20px; border-radius:10px; width:400px; font-family:Arial, sans-serif; color:#1E3A8A;">
        @csrf
        @method('PUT')
        <label for="ticket_text" style="font-weight:bold;">Ticket Text:</label><br>
        <textarea id="ticket_text" name="ticket_text" rows="5" cols="40" required
                  style="width:100%; padding:10px; border:1px solid #3B82F6; border-radius:6px; outline:none; color:#1E3A8A;">{{$ticket->ticket_text}}</textarea><br><br>

        <button type="submit"
                style="background:#3B82F6; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; font-weight:bold;">
            Submit
        </button>
    </form>

@endsection
