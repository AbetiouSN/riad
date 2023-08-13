<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_histoire extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'quantité', 'catégorie', 'prix','date','etat'];

    public static function getProductsForDate($specificDate)
    {
        return self::whereDate('date', $specificDate)->get();
    }
}
