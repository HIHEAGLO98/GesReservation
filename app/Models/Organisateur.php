<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    //protected $guard = [];
    protected $fillable = [
        'id',
        'nom',
        'contact',
        'user_id'
    ];

    /** 1
     * un organisateur peut organiser  un ou plusieurs événements.
     */
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
