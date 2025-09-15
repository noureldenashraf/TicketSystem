<?php

namespace App\Services;

use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;

class TicketService
{
    public function getAllTickets()
    {
        return Ticket::all();
    }
    public function getTicketById ($id) {
        $ticket = Ticket::query()->findOrFail($id);
        return $ticket;
    }
    public function addTicket(array $data) : Ticket {
        $ticket = new Ticket();
        $ticket->setAttribute("ticket_text",$data["ticket_text"]);
        $ticket->setAttribute("user_id",auth()->id());
        try {
            $ticket->save();
        }
        catch (Exception $exception){
            abort(404);

        }
        return $ticket;

    }

}
