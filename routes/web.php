<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("ticket.index");
});
Route::patch("/ticket/{ticket_id}",[TicketController::class,"toggle"])->middleware("auth","verified")->name("ticket.toggle");
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class , "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/ticket", TicketController::class)->middleware("auth");
Route::get("/ticket/{ticket}",[TicketController::class,"show"])->middleware("auth")->name("ticket.show");

Route::post("/ticket/{ticket_id}/comment",[CommentController::class , 'store'])->name("ticket.comment")->middleware(["auth","verified"]);
require __DIR__.'/auth.php';
