<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bouteille;
use App\Models\Cellier;
use App\Models\BouteilleHasCellier;

class BouteilleHasCellierController extends Controller
{
    // Page d'accueil de la liste des bouteilles dans les celliers
    public function index()
    {
        // Page courante :
        $pageCourante = 'bouteilleHasCellierIndex';
        $bouteillesHasCelliers = BouteilleHasCellier::all();

        return view('bouteille_has_cellier.index', compact('bouteillesHasCelliers', 'pageCourante'));
    }

    // Page de création d'une bouteille dans un cellier
    public function create()
    {
        // Page courante :
        $pageCourante = 'bouteilleHasCellierCreate';
        $bouteilles = Bouteille::all();
        // $les cellier de l'utilisateur
        $celliers = Cellier::where('user_id', auth()->id())->get();

        return view('bouteille_has_cellier.create', compact('bouteilles', 'celliers', 'pageCourante'));
    }

    // Fonction pour stocker une bouteille dans un cellier
    public function store(Request $request)
    {
        $request->validate([
            'bouteille_id' => 'required|exists:bouteilles,id',
            'cellier_id' => 'required|exists:celliers,id',
            'quantite' => 'required|integer|min:1',
            'favoris' => 'boolean',
        ]);

        // Vérification si la bouteille est déjà dans ce cellier
        $existing = BouteilleHasCellier::where('bouteille_id', $request->bouteille_id)
            ->where('cellier_id', $request->cellier_id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Cette bouteille est déjà dans ce cellier.');
        }

        // Création de l'enregistrement
        BouteilleHasCellier::create($request->all());

        // Redirige vers la page du cellier spécifique après l'ajout
        return redirect()->route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $request->cellier_id])
            ->with('success', 'Bouteille ajoutée au cellier avec succès.');
    }

    // Page d'édition d'une bouteille dans un cellier
    public function edit($cellier_id, $bouteille_id)
    {
        // Page courante :
        $pageCourante = 'bouteilleHasCellierEdit';
        $bouteilleHasCellier = BouteilleHasCellier::where('bouteille_id', $bouteille_id)
            ->where('cellier_id', $cellier_id)
            ->first();

        $bouteilles = Bouteille::all();
        $celliers = Cellier::all();

        return view('bouteille_has_cellier.edit', compact('bouteilleHasCellier', 'bouteilles', 'celliers', 'pageCourante'));
    }

    // Fonction pour mettre à jour une bouteille dans un cellier
    public function update(Request $request, $cellier_id, $bouteille_id)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
            'favoris' => 'boolean',
        ]);

        $bouteilleHasCellier = BouteilleHasCellier::where('bouteille_id', $bouteille_id)
            ->where('cellier_id', $cellier_id)
            ->first();

        if (!$bouteilleHasCellier) {
            return redirect()->route('cellier_bouteilles.index')->with('error', 'Cette bouteille n\'existe pas dans ce cellier.');
        }

        // Mise à jour
        $bouteilleHasCellier->update($request->all());

        return redirect()->route('cellier_bouteilles.index')->with('success', 'Bouteille mise à jour avec succès.');
    }

    // Fonction pour supprimer une bouteille dans un cellier
    public function destroy($cellier_id, $bouteille_id)
    {
        $deleted = BouteilleHasCellier::where('bouteille_id', $bouteille_id)
            ->where('cellier_id', $cellier_id)
            ->delete(); // <- ici : on supprime directement

        if ($deleted) {
            return redirect()->route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $cellier_id])
                ->with('success', 'Bouteille supprimée du cellier avec succès.');
        } else {
            return redirect()->route('cellier_bouteilles.cellier.bouteilles', ['cellier_id' => $cellier_id])
                ->with('error', 'Cette bouteille n\'existe pas dans ce cellier.');
        }
    }

    // Fonction pour montrer toutes les bouteilles d'un cellier
    public function bouteillesDansCellier($cellier_id, Request $request)
    {

        $demande = $request->input('requete');
        // $reponses = Bouteille::where('nom' , 'like', "%{$query}%")->orWhere('format','like',"%{$query}%")->get();
 
        // Page courante :
        $pageCourante = 'bouteillesParCellier';
        $bouteilles = BouteilleHasCellier::with(['bouteille', 'cellier'])
            ->where('cellier_id', $cellier_id)
            ->get();

        $cellier = Cellier::findOrFail($cellier_id);

        $reponses = BouteilleHasCellier::select()->where('cellier_id', $cellier_id)->join('bouteilles','bouteille_id','=','bouteilles.id')->where('nom' , 'like', "%{$demande}%")->get();

        session()->put('id_cellier',$cellier_id);
        
        return view('bouteille_has_cellier.par_cellier', compact('bouteilles', 'cellier_id', 'pageCourante', 'cellier','reponses'));
    }

    // Fonction pour montrer toutes les bouteilles de l'utilisateur
    public function bouteillesUtilisateur($user_id)
    {
        // Page courante :
        $pageCourante = 'bouteillesParUtilisateur';
        $bouteillesUtilisateur = BouteilleHasCellier::with('bouteille')
            ->whereHas('cellier', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->get();

        return view('bouteille_has_cellier.BouteillesUtilisateur', compact('bouteillesUtilisateur', 'user_id', 'pageCourante'));
    }
}
