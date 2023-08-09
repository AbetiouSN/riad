<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entre extends Model
{
    use HasFactory;
    protected $fillable = ['quantité', 'id_produit'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
