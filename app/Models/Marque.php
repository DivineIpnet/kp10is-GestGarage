<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modele;
use App\Models\Voiture;

class Marque extends Model
{
    use HasFactory;
    protected $table = 'marque';

        protected $fillable = [
            'nom'
        ];

   public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

   public function modeles()
    {
        return $this->hasMany(Modele::class);
    }
}
