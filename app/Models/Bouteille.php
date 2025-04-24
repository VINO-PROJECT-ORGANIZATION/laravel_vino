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
}
