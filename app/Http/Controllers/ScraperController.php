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
            Bouteille::create(
                [
                    'nom' => $bouteille['nom'],
                    'pays' => $bouteille['pays'],
                    'code_saq' => $bouteille['code_saq'],
                    'prix_saq' => floatval(str_replace(',', '.', preg_replace('/[^\d,]/', '', $bouteille['prix_saq']))),
                    'url_image' => $bouteille['url_image'],
                    'format' => $bouteille['format'],
                    'type' => $bouteille['type'],
                    'bue' => 4, // 4 = non bue],
                ]



            );
        }
        // envoyer un message de succès
        session()->flash('success', 'Les bouteilles ont été ajoutées avec succès !');
        return view('scrapper.index', compact('codes_saq', 'bouteilles'));
    }
}
