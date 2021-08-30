<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'lib_ticket',
        'mode_paiement',
        'type_ticket_id',
        'participant_id',
        'evenement_id',   
    ];
     /** 1
     * Un ticket appartient à un seul participant.
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class,"participant_id","id");
    }

    /** 2
     * un ticket a un seul type_ticket .
     */
    public function type_ticket()
    {
        return $this->belongsTo(Type_ticket::class,"type_ticket_id",'id');
    }

    //3 un ticket appartient à un seul événement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class, "evenement_id","id");
    }
}
