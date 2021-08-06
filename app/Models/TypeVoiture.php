<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voiture;

class TypeVoiture extends Model
{
    use HasFactory;

     protected $table = 'typevoiture';

        protected $fillable = [
            'nom'
        ];

     public function voitures()
     {
         return $this->hasMany(Voiture::class);
     }
}
