<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Ticket;

class CommentService
{

    public function addComment(array $data,$ticket_id) {
        $ticket = Ticket::query()->findOrFail($ticket_id);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->comment_text = $data["comment_text"];
        $comment->ticket_id = $ticket_id;
        $comment->save();

    }

}
