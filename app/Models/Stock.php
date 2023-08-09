<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['quantité_initiale', 'quantité_finale'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
