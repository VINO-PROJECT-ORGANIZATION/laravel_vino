<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cellier extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'teinte',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bouteilles()
    {
        return $this->belongsToMany(Bouteille::class, 'bouteille_has_celliers', 'cellier_id', 'bouteille_id')
            ->withPivot('quantite', 'favoris');
    }
}
