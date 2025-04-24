<?php

namespace App\Http\Controllers;

use App\Services\SAQScraperService;
use App\Models\Bouteille;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(SAQScraperService $scraper)
    {
        $codes_saq = $scraper->chercherSAQCodes();
        $bouteilles = $scraper->chercherBouteilles($codes_saq);


        // Enregistrer les bouteilles dans la base de données
        foreach ($bouteilles as $bouteille) {
            // Vérifier si la bouteille existe déjà
            if (!Bouteille::where('code_saq', $bouteille['code_saq'])->exists()) {
                // Si la bouteille n'existe pas, l'ajouter
                Bouteille::create(
                    [
                        'nom' => $bouteille['nom'],
                        'pays' => $bouteille['pays'],
                        'code_saq' => $bouteille['code_saq'],
                        'prix_saq' => $bouteille['prix_saq'],
                        'url_image' => $bouteille['url_image'],
                        'format' => $bouteille['format'],
                        'type' => $bouteille['type'],
                        'bue' => 4, // 4 = non bue],
                    ]
                );
            }
        }

        return view('scrapper.index', compact('codes_saq', 'bouteilles'));
    }
}
