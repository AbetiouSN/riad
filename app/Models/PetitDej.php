<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitDej extends Model
{
    use HasFactory;
    protected $fillable = ['numéro_bon', 'prix_restau', 'prix_riad'];

}
