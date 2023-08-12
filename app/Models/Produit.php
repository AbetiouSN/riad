<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'quantité', 'catégorie', 'prix'];

    // public function stock()
    // {
    //     return $this->belongsTo(Stock::class, 'id_stock');
    // }

    public function produitVents()
    {
        return $this->hasMany(ProduitVent::class);
    }
    public function sorties()
    {
        return $this->hasMany(Sortie::class);
    }
}
