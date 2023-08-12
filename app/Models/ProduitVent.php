<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitVent extends Model
{
    use HasFactory;
    protected $fillable = ['quantité', 'prix_produit', 'prix_total', 'somme_jour', 'type_vent', 'id_produit','date'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public static function getProductsForDate($specificDate)
    {
        return self::whereDate('date', $specificDate)->get();
    }

}
