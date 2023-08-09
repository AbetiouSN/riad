<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $fillable = ['quantité', 'id_produit', 'id_client'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
