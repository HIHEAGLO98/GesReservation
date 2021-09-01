<?php

namespace App\Models;

use App\Models\Salle;
use App\Models\Ticket;
use App\Models\Reservation;
use App\Models\Type_evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'description',
        'nombre_place',
        'datedebut',
        'datefin',
        'heuredebut',
        'heurefin',
        'salle_id',
        'type_evenement_id',
        'organisateur_id'
    ];
    /** 1
     * un organisateur  peut organiser plusieurs événements.
     */
    public function organisateur()
    {
        return $this->belongsTo(Organisateur::class,"organisateur_id", "id");
    }


    /** 2
     * un événement a un ou plusieurs images.
     */
    public function images()
    {
        return $this->hasOne(Image::class);
    }


    /** 3
     * un événement se déroule dans une seule  salle.
     */
    public function salle()
    {
        return $this->belongsTo(Salle::class,"salle_id","id");
    }

    /** 4
     * un événement regroupe  plusieurs Tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /** 5
     * un événement appartient à un seul type d'événements.
     */
    public function type_evenement()
    {
        return $this->belongsTo(Type_evenement::class,"type_evenement_id","id");
    }
    /** 6
     * un événement peut faire  l'objet de plusieurs réservations.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
