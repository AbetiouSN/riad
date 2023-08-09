<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'payment', 'type_payment', 'id_réservation', 'id_produit'];

    public function réservation()
    {
        return $this->belongsTo(Réservation::class, 'id_réservation');
    }

    public function produitVents()
    {
        return $this->hasMany(ProduitVent::class);
    }
}
