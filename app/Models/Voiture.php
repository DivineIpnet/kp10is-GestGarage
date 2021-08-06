<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeVoiture;
use App\Models\Proprietaire;
use App\Models\Marque;
use App\Models\Piece;

class Voiture extends Model
{
    use HasFactory;
    protected $table = 'voiture';

    protected $fillable = [
        'image', 'matricule', 'status', 'type_voiture_id', 'marque_id', 'proprietaire_id'
    ];

    public function typevoiture()
    {
        return $this->belongsTo(TypeVoiture::class);
    }

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }
}
