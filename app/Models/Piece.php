<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voiture;

class Piece extends Model
{
    use HasFactory;
     protected $table = 'piece';

        protected $fillable = [
            'nom'
        ];

   public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}
