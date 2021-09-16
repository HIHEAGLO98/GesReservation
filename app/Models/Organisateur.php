<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;
    
    protected $fillable = [
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

    //un organisateur est un user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
