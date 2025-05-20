<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use App\Models\BouteilleHasCellier;


use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function welcome()
    {
        $pageCourante = 'accueil';
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $celliers = collect();
        $quantiteBouteilles = [];

        if ($user) {
            $celliers = Cellier::where('user_id', $user->id)->get();
            foreach ($celliers as $cellier) {
                $quantiteBouteilles[$cellier->id] = BouteilleHasCellier::totalBouteilles($cellier->id);
            }
        }

        return view('welcome', compact('pageCourante', 'user', 'celliers', 'quantiteBouteilles'));
    }
}
