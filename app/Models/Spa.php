<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spa extends Model
{
    use HasFactory;
    protected $fillable = ['id_réservation', 'catégorie', 'nom_soin', 'dépense', 'nom_réceptionniste', 'prix', 'somme', 'id_client'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
