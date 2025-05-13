<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;

use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //afficher toutes les bouteilles
        $bouteilles = Bouteille::paginate(50);
        $pageCourante = 'bouteilles';

        // return view('index', compact('bouteilles'));


        // tu avais oublie de mettre bouteilles.index pour afficher la page 
        return view('bouteilles.index', compact('bouteilles', 'pageCourante'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //page courante
        $pageCourante = 'bouteilles';
        //montrer le formulaire de création d'une bouteille

        // display user id
        $user_id = auth()->id();
        do {
            $code_saq = now()->format('ymdHis') . $user_id;
        } while (\App\Models\Bouteille::where('code_saq', $code_saq)->exists());
    

        return view('bouteilles.create', compact('pageCourante', 'code_saq'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($_POST);
        // exit;
        // ajouter une bouteille provenant du formulaire de la page bouteilles.create

        // do {
        //     $code_saq = now()->format('ymdHis') . auth()->id();
        // } while (\App\Models\Bouteille::where('code_saq', $code_saq)->exists());
        //combine the current date and the user id to create a unique code_saq

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

        // $validee['code_saq'] = $code_saq;

        // Bouteille::create($validee);
        
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
        //
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
