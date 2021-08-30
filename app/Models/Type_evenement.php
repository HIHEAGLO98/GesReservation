<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_type_ev',
    ];
     /**
     * un type d'événement regroupe  plusieurs événements.
     */
    public function evenement()
    {
        return $this->hasMany(Evenement::class, "evenement_id", "id");
    }
}
