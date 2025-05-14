<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use App\Models\BouteilleHasCellier;


use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function welcome()
    {
        //page courante
        $pageCourante = 'accueil';
        //utilisateur authentifié
        $user = auth()->user();
        // les cellier de l'utilisateur
        $celliers = Cellier::where('user_id', $user->id)->get();
        // utilisation de la fonction scopeTotalBouteilles pour obtenir le nombre total de bouteilles dans un cellier
        $quantiteBouteilles = [];
        foreach ($celliers as $cellier) {
            $quantiteBouteilles[$cellier->id] = BouteilleHasCellier::totalBouteilles($cellier->id);
        }
        return view('welcome', compact('pageCourante', 'user', 'celliers', 'quantiteBouteilles'));
    }
}
