<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marque;
class Modele extends Model
{
    use HasFactory;
     protected $table = 'modele';

        protected $fillable = [
            'nom', 'annee', 'marque_id'
        ];

   public function marque()
    {
        return $this->belongsTo(Marque::class);
    }
}
