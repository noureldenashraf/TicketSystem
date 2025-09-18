<?php

namespace App\Http\Middleware;

use App\Services\TicketService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class accessTickets
{
    public function __construct(protected TicketService $ticketService)
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == "admin")
        {
            return $next($request);
        }
        else{
            $ticket = $this->ticketService->getTicketById($request->route("ticket"));
            if(auth()->id() == $ticket->user_id) {
                return $next($request);
            }
            abort(401);

        }

    }
}
