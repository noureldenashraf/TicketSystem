<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Ticket;

class CommentService
{

    public function addComment(array $data,$id) {
        $ticket = Ticket::query()->findOrFail($id);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->comment_text = $data["comment_text"];
        $comment->ticket_id = $id;
        $comment->save();

    }

}
