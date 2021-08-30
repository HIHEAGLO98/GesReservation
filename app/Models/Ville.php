<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_ville',
        'pays_id',
        
    ];

    /** 1
     * une ville regorge plusieurs salles.
     */
    public function salles()
    {
        return $this->hasMany(Salle::class);
    }

    /** 2
     * une ville appartient à un seul pays .
     */
    public function pays()
    {
        return $this->belongsTo(Pays::class, "pays_id", "id");
    }
}
