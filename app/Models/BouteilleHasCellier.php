<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BouteilleHasCellier extends Model
{
    use HasFactory;

    protected $fillable = [
        'bouteille_id',
        'cellier_id',
        'quantite',
        'favoris',
    ];

    public function bouteille()
    {
        return $this->belongsTo(Bouteille::class);
    }
    public function cellier()
    {
        return $this->belongsTo(Cellier::class);
    }
    public function scopeFavoris($query)
    {
        return $query->where('favoris', true);
    }
    public function scopeQuantite($query)
    {
        return $query->where('quantite', '>', 0);
    }
}
