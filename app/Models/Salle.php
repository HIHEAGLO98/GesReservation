<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_salle',
        'ville_id',   
    ];

    //une salle appartient à une seule ville
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    
}
