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
        $ticket = Ticket::with("comments")->findOrFail($id);
        return $ticket;
    }
    public function addTicket(array $data) : Ticket {
        $ticket = new Ticket();
//        $ticket->setAttribute("ticket_text",$data["ticket_text"]);
        $ticket->ticket_text = $data["ticket_text"];
        $ticket->user_id = auth()->id();
        try {
            $ticket->save();
        }
        catch (Exception $exception){
            abort(404);

        }
        return $ticket;

    }
    public function editTicket (array $data,$id) {
        $ticket = Ticket::query()->findOrFail($id);
        $ticket->ticket_text = $data["ticket_text"];
        try {
            $ticket->save();
        }
        catch (Exception $exception){
            abort(404);

        }
        return $ticket;

    }
    public function deleteTicket ($id) {
        $ticket = Ticket::query()->findOrFail($id);
        try {
            $ticket->delete();
        }
        catch (Exception $exception){
            abort(404);

        }
    }

}
