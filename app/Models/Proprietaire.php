<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voiture;

class Proprietaire extends Model
{
    use HasFactory;

    protected $table = 'proprietaire';

        protected $fillable = [
            'nom', 'prenom', 'telephone', 'adresse'
        ];

   public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}
