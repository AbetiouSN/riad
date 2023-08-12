<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entre extends Model
{
    use HasFactory;
    protected $fillable = ['quantité', 'id_produit','date'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public static function getProductsForDate($specificDate)
    {
        return self::whereDate('date', $specificDate)->get();
    }
}
