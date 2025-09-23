<?php

namespace App\Http\Controllers;

use App\Services\TicketService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(protected TicketService $ticketService){}

    public function index () {
        return
    }
}
