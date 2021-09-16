<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

   // protected $guard =[];
    protected $fillable = [
        'id',
        'nom',
        'telephone',
        'user_id',
    ];

    /** 1
     * Un participant peut acheter plusieurs tickets .
     */
    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

     /** 2
     * un participant peut faire  une ou plus réservations.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    //un participant est un user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
