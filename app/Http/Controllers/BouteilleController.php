<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;

use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $demande = $request->input('requete');
        if ($demande == '') {

            $bouteilles = Bouteille::paginate(5);
        } else {

            $bouteilles = Bouteille::select()->where(function ($query) use ($demande) {

                $query->where('nom', 'like', "%{$demande}%")
                    ->orWhere('format', 'like', "%{$demande}%")
                    ->orWhere('pays', 'like', "%{$demande}%")
                    ->orWhere('code_saq', 'like', "%{$demande}%")
                    ->orWhere('type', 'like', "%{$demande}%");
            })->paginate(50)->withQueryString();
        }


        //afficher toutes les bouteilles
        // $bouteilles = Bouteille::paginate(50);
        $pageCourante = 'bouteilles';

        // return view('index', compact('bouteilles'));

        return view('bouteilles.index', compact('bouteilles', 'pageCourante', 'demande'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //page courante
        $pageCourante = 'bouteilles';
        //montrer le formulaire de création d'une bouteille

        // récupérer l'ID de l'utilisateur authentifié
        $user_id = auth()->id();

        // Boucle pour générer un code unique
        // Vérifier si le code existe déjà dans la base de données
        do {
            //Combiner la date, l'heure, la minute et les secondes actuelles avec l'ID de l'utilisateur pour créer un code unique
            $code_saq = now()->format('ymdHis') . $user_id;
        } while (\App\Models\Bouteille::where('code_saq', $code_saq)->exists());


        return view('bouteilles.create', compact('pageCourante', 'code_saq'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validee = $request->validate([
            'nom' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'degre_alcool' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'code_saq' => 'required|string|max:255',
        ]);
        // Créer une nouvelle bouteille
        $bouteille = new Bouteille();
        $bouteille->nom = $request->nom;
        $bouteille->pays = $request->pays;
        $bouteille->format = $request->format;
        $bouteille->degre_alcool = $request->degre_alcool;
        $bouteille->region = $request->region;
        $bouteille->type = $request->type;
        $bouteille->code_saq = $request->code_saq;
        $bouteille->save();


        // rediriger vers la page de la bouteille
        return redirect()->route('bouteilles.index')->with('success', 'Bouteille created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bouteille = Bouteille::find($id);
        if (!$bouteille) {
            return redirect()->route('dashboard')->with('error', 'Bouteille not found');
        }
        return view('bouteilles.show', compact('bouteille'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //page courante
        $pageCourante = 'bouteilles';
        //montrer le formulaire d'édition d'un bouteille
        $bouteille = Bouteille::find($id);

        return view('bouteilles.edit', compact('bouteille', 'pageCourante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
