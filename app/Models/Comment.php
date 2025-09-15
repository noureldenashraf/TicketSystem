<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function tickets()
    {
        return $this->hasOne(Ticket::class);
    }
}
