<?php

namespace App\Services;

use App\Models\Ticket;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function accessTickets(Ticket $ticket) : bool{
        if(auth()->user()->role == "admin" || auth()->id() == $ticket->user_id){
            return true;
        }
        return false;
    }
    public function getAllTickets()
    {
        // TODO
        // i believe i can optimize this query later
        // return only the needed columns :)

        if(auth()->user()->role == "admin"){
            return Ticket::query()->select("tickets.id","tickets.open","tickets.created_at")->paginate(5);
        }
        else {
            return Ticket::query()->select("tickets.id","tickets.open","tickets.created_at")->where("tickets.user_id",auth()->id())->paginate(5);
        }

    }

    public function getAllTicketsByMonth($month,$year = null) {
        if($year == null) {
            $year = Carbon::$year; // in case we don't specify the year we deafult assign current year
        }
        $tickets =
        Ticket::query()
        ->whereYear("tickets.created_at",$year)
        ->whereMonth("tickets.created_at",$month)
        ->paginate(10);

        return $tickets;

    }
    public function getTicketById ($id) {

        $ticket = Ticket::query()->findOrFail($id);
        if($this->accessTickets($ticket)) {
            $comments = $ticket->comments()->
            with("user")->
            latest()->
            paginate(2);

            return [
                "ticket" => $ticket,
                "comments" => $comments
            ];
        }
        abort(404);
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
        if($this->accessTickets($ticket)) {
            $ticket->ticket_text = $data["ticket_text"];
            try {
                $ticket->save();
            } catch (Exception $exception) {
                abort(404);

            }
            return $ticket;
        }
        abort(401);

    }
    public function deleteTicket ($id) {
        $ticket = Ticket::query()->findOrFail($id);
        if($this->accessTickets($ticket)) {
            try {
                $ticket->delete();
                return;
            } catch (Exception $exception) {
                abort(404);

            }
        }
        abort(401);
    }
    public function toggleTicketStatus ($id): array
    {
       $ticket_data = $this->getTicketById($id);
       $ticket = $ticket_data["ticket"];
       $comments = $ticket_data["comments"];
       if($ticket->open){
           $ticket->open = false;
       }
       else {
           $ticket->open = true;
       }
        $ticket->save();
        return [
            "ticket" => $ticket,
            "comments" => $comments
        ];

    }

    public function ticketsCount () {
        return Ticket::count();
    }


}
