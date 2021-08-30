<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'evenement_id'];
    /**
     * @var false|mixed|string
    */
   
    /**
     * une image appartient à un seul  événement.
     */
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
