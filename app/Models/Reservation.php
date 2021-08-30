<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_r',
        'participant_id',
        'evenement_id',   
    ];

     /**1
     * une réservation appartient à un seul participant=>user.
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class,"participant_id","id");
    }
    /** 2
     * une réservation concerne un seul événement.
     */
    public function evenement()
    {
        return $this->belongsTo(Evenement::class, "evenement_id", "id");
    }
}
