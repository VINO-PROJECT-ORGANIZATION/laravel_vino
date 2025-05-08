<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    protected $fillable = [
        'nom',
        'pays',
        'format',
        'url_image',
        'prix_saq',
        'code_saq',
        'degre_alcool',
        'note_saq',
        'region',
        'type',
    ];
    use HasFactory;

    public function nettoyerPrix($prix)
    {
        // Enlève les caractères non numériques et remplace la virgule par un point
        $prix = preg_replace('/[^\d,]/', '', $prix);
        $prix = str_replace(',', '.', $prix);

        return floatval($prix);
    }

    public function infoBouteille()
    {
        return $this->hasMany(BouteilleHasCellier::class);
    }
}
