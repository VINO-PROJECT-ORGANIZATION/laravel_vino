<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bouteille;
use App\Models\Cellier;
use App\Models\BouteilleHasCellier;

class BouteilleHasCellierController extends Controller
{
    //page d'accueil de la liste des bouteilles dans les celliers
    public function index()
    {
        // page courante :
        $pageCourante = 'bouteilleHasCellierIndex';
        $bouteilles = Bouteille::all();
        $celliers = Cellier::all();
        $bouteilleHasCelliers = BouteilleHasCellier::all();

        return view('bouteille_has_cellier.index', compact('bouteilles', 'celliers', 'bouteilleHasCelliers', 'pageCourante'));
    }
    // page de création d'une bouteille dans un cellier
    public function create()
    {
        // page courante :
        $pageCourante = 'bouteilleHasCellierCreate';
        $bouteilles = Bouteille::all();
        $celliers = Cellier::all();

        return view('bouteille_has_cellier.create', compact('bouteilles', 'celliers', 'pageCourante'));
    }
    // fonction pour stocker une bouteille dans un cellier
    public function store(Request $request)
    {
        $request->validate([
            'bouteille_id' => 'required|exists:bouteilles,id',
            'cellier_id' => 'required|exists:celliers,id',
            'quantite' => 'required|integer|min:1',
            'favoris' => 'boolean',
        ]);

        BouteilleHasCellier::create($request->all());

        return redirect()->route('bouteille_has_cellier.index')->with('success', 'Bouteille ajoutée au cellier avec succès.');
    }
    // page d'édition d'une bouteille dans un cellier
    public function edit($id)
    {
        // page courante :
        $pageCourante = 'bouteilleHasCellierEdit';
        $bouteilleHasCellier = BouteilleHasCellier::get($id);
        $bouteilles = Bouteille::all();
        $celliers = Cellier::all();

        return view('bouteille_has_cellier.edit', compact('bouteilleHasCellier', 'bouteilles', 'celliers', 'pageCourante'));
    }
    // fonction pour mettre à jour une bouteille dans un cellier
    public function update(Request $request, $id)
    {
        $request->validate([
            'bouteille_id' => 'required|exists:bouteilles,id',
            'cellier_id' => 'required|exists:celliers,id',
            'quantite' => 'required|integer|min:1',
            'favoris' => 'boolean',
        ]);

        $bouteilleHasCellier = BouteilleHasCellier::get($id);
        $bouteilleHasCellier->update($request->all());

        return redirect()->route('bouteille_has_cellier.index')->with('success', 'Bouteille mise à jour avec succès.');
    }
    // fonction pour supprimer une bouteille dans un cellier
    public function destroy($id)
    {
        $bouteilleHasCellier = BouteilleHasCellier::get($id);
        $bouteilleHasCellier->delete();

        return redirect()->route('bouteille_has_cellier.index')->with('success', 'Bouteille supprimée du cellier avec succès.');
    }
    // Fonction pour montrer toutes les bouteilles d'un cellier
    public function bouteillesDansCellier($cellier_id)
    {
        // page courante :
        $pageCourante = 'bouteillesParCellier';
        $bouteilles = BouteilleHasCellier::with('bouteille')
            ->where('cellier_id', $cellier_id)
            ->get();

        return view('bouteille_has_cellier.par_cellier', compact('bouteilles', 'cellier_id', 'pageCourante'));
    }
    // Fonction pour montrer toutes les bouteilles de l'utilisateur
    public function bouteillesUtilisateur($user_id)
    {
        // page courante :
        $pageCourante = 'bouteillesParUtilisateur';
        $bouteilles = BouteilleHasCellier::with('bouteille')
            ->whereHas('cellier', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->get();

        return view('bouteille_has_cellier.BouteillesUtilisateur', compact('bouteilles', 'user_id', 'pageCourante'));
    }
}
