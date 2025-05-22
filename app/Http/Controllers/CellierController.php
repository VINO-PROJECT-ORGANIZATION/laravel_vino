<?php

namespace App\Http\Controllers;

use App\Models\BouteilleHasCellier;
use Illuminate\Http\Request;
use App\Models\Cellier;
use Illuminate\Validation\Rule;

class CellierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //page courante
        $pageCourante = 'celliers';
        //montrer la liste des celliers de l'utilisateur
        $celliers = Cellier::where('user_id', auth()->id())->get();

        // utilisation de la fonction scopeTotalBouteilles pour obtenir le nombre total de bouteilles dans un cellier
        $quantiteBouteilles = [];
        foreach ($celliers as $cellier) {
            $quantiteBouteilles[$cellier->id] = BouteilleHasCellier::totalBouteilles($cellier->id);
        }



        return view('celliers.index', compact('celliers', 'pageCourante', 'quantiteBouteilles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //page courante
        $pageCourante = 'celliers';
        //montrer le formulaire de création d'un cellier
        return view('celliers.create', compact('pageCourante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //valider les données
        $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
                // vérifier que le nom du cellier est unique pour l'utilisateur
                Rule::unique('celliers')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'teinte' => 'nullable|string|max:255',
        ]);


        //créer le cellier
        $cellier = new Cellier();
        $cellier->nom = $request->nom;
        $cellier->teinte = $request->teinte;
        $cellier->user_id = auth()->id();
        $cellier->save();

        //redirection vers la liste des celliers
        return redirect()->route('celliers.index')->with('success', 'Cellier créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //page courante
        $pageCourante = 'celliers';
        //montrer le formulaire d'édition d'un cellier
        $cellier = Cellier::find($id);

        return view('celliers.edit', compact('cellier', 'pageCourante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //valider les données
        $request->validate([
            'nom' => [
                'required',
                'string',
                'max:50',
                // vérifier que le nom du cellier est unique pour l'utilisateur
                Rule::unique('celliers')->where(function ($query) use ($id) {
                    return $query->where('user_id', auth()->id())->where('id', '<>', $id);
                }),
            ],
            'teinte' => 'nullable|string|max:7',
        ]);

        //mettre à jour le cellier
        $cellier = Cellier::find($id);
        $cellier->nom = $request->nom;
        $cellier->teinte = $request->teinte;
        $cellier->save();

        //redirection vers la liste des celliers
        return redirect()->route('celliers.index')->with('success', 'Cellier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //supprimer le cellier
        $cellier = Cellier::find($id);
        $cellier->delete();

        //redirection vers la liste des celliers
        return redirect()->route('celliers.index')->with('success', 'Cellier supprimé avec succès.');
    }
}
