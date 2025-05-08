<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        return view('celliers.index', compact('celliers', 'pageCourante'));
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
            'nom' => 'required|string|max:255|unique:celliers',
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
