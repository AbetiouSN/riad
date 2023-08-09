<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prénom', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
