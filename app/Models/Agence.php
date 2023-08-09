<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;
    protected $fillable = ['nom_activité', 'nom_réceptionniste', 'nbr_nuit', 'id_client'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
