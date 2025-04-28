<?php

namespace App\Http\Controllers;

use App\Models\bouteille;

use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //afficher toutes les bouteilles
        $bouteilles = Bouteille::all();

        // return view('index', compact('bouteilles'));


        // tu avais oublie de mettre bouteilles.index pour afficher la page 
        return view('bouteilles.index', compact('bouteilles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
