<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_ticket extends Model
{
    use HasFactory;

     /**
     * Un type ticket contient plusieurs tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
