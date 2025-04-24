<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    protected $fillable = [
        'nom',
        'pays',
        'code_saq',
        'prix_saq',
        'url_image',
        'format',
        'type',
        'bue'
    ];
    use HasFactory;

    public function nettoyerPrix($prix)
    {
        // Enlève les caractères non numériques et remplace la virgule par un point
        $prix = preg_replace('/[^\d,]/', '', $prix);
        $prix = str_replace(',', '.', $prix);

        return floatval($prix);
    }
}
