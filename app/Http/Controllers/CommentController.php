<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use App\Services\TicketService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService,protected TicketService $ticketService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$ticket_id)
    {
        $ticket = $this->ticketService->getTicketById($ticket_id)["ticket"];
        if(auth()->user()->role == "admin" || auth()->id() == $ticket->user_id) {
            $data = $request->validate(
                [
                    "comment_text" => "required"
                ]
            );
            $this->commentService->addComment($data, $ticket_id);
            return redirect()->route("ticket.show", $this->ticketService->getTicketById($ticket_id));
        }
        abort(401);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
