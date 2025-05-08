<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BouteilleHasCellier extends Model
{
    use HasFactory;

    // Laravel ne peut pas incrémenter une clé primaire composite
    public $incrementing = false;

    // Type des clés primaires (entiers)
    protected $keyType = 'int';

    // Clé primaire composite — attention : utilisée à titre informatif
    protected $primaryKey = ['bouteille_id', 'cellier_id'];
    protected $fillable = [
        'bouteille_id',
        'cellier_id',
        'quantite',
        'favoris',
    ];

    public function bouteille()
    {
        return $this->belongsTo(Bouteille::class, 'bouteille_id');
    }
    public function cellier()
    {
        return $this->belongsTo(Cellier::class, 'cellier_id');
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
