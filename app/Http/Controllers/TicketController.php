<?php

namespace App\Http\Controllers;

use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct (protected TicketService $ticketService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("ticket.index",["tickets" => $this->ticketService->getAllTickets()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ticket.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                //"user_id" => "required",
                "ticket_text" => "required",
            ]
        );
        $ticket = $this->ticketService->addTicket($data);
        return view("ticket.show",$this->ticketService->getTicketById($ticket->id));

        // remeber to verify here
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view("ticket.show",$this->ticketService->getTicketById($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("ticket.edit",["ticket" => $this->ticketService->getTicketById($id)]["ticket"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                //"user_id" => "required",
                "ticket_text" => "required",
            ]);
        $ticket = $this->ticketService->editTicket($data,$id);
        return view("ticket.show",$this->ticketService->getTicketById($ticket->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ticketService->deleteTicket($id);
        return redirect()->route("ticket.index");
    }
    public function toggle (string $id) {

        return view("ticket.show",$this->ticketService->toggleTicketStatus($id));
    }
}
