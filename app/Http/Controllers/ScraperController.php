<?php

namespace App\Http\Controllers;

use App\Services\SAQScraperService;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Models\Recherche_saq_codes;

class ScraperController extends Controller
{
    public function index(SAQScraperService $scraper)
    {
        $codes_saq = $scraper->chercherSAQCodes();

        $codes_saq = array_unique($codes_saq); // Supprimer les doublons

        //enregistrer $code_saq dans la base de données dans la table recherche_codes_saq sous forme JSON
        Recherche_saq_codes::create([
            'recherche' => json_encode($codes_saq)
        ]);

        //voir le contenu de la table recherche_codes_saq
        $recherche_saq_codes = Recherche_saq_codes::all();

        // recupération des information des bouteilles sur le site de la saq par groupe de 50 bouteilles.

        $bouteilles = [];
        $chunks = array_chunk($codes_saq, 50); // Diviser les codes en morceaux de 50
        foreach ($chunks as $chunk) {
            $bouteilles_chunk = $scraper->chercherBouteilles($chunk);
            $bouteilles = array_merge($bouteilles, $bouteilles_chunk);
            // Enregistrer les bouteilles dans la base de données
            foreach ($bouteilles_chunk as $bouteille) {
                // Vérifier si la bouteille existe déjà
                if (!Bouteille::where('code_saq', $bouteille['code_saq'])->exists()) {
                    // Si la bouteille n'existe pas, l'ajouter
                    Bouteille::create(
                        [
                            'nom' => $bouteille['nom'],
                            'pays' => $bouteille['pays'],
                            'format' => $bouteille['format'],
                            'url_image' => $bouteille['url_image'],
                            'prix_saq' => $bouteille['prix_saq'],
                            'code_saq' => $bouteille['code_saq'],
                            'degre_alcool' => $bouteille['degre_alcool'],
                            'note_saq' => $bouteille['note_saq'],
                            'region' => $bouteille['region'],
                            'type' => $bouteille['type'],
                        ]
                    );
                }
            }
            // Pause de 1 seconde entre chaque requête pour éviter de surcharger le serveur
            sleep(1);

            // message de succès
            session()->flash('success', 'Les bouteilles ont été récupérées avec succès.');
        }




        // $bouteilles = $scraper->chercherBouteilles($codes_saq);


        // // Enregistrer les bouteilles dans la base de données
        // foreach ($bouteilles as $bouteille) {
        //     // Vérifier si la bouteille existe déjà
        //     if (!Bouteille::where('code_saq', $bouteille['code_saq'])->exists()) {
        //         // Si la bouteille n'existe pas, l'ajouter
        //         Bouteille::create(
        //             [
        //                 'nom' => $bouteille['nom'],
        //                 'pays' => $bouteille['pays'],
        //                 'format' => $bouteille['format'],
        //                 'url_image' => $bouteille['url_image'],
        //                 'prix_saq' => $bouteille['prix_saq'],
        //                 'code_saq' => $bouteille['code_saq'],
        //                 'degre_alcool' => $bouteille['degre_alcool'],
        //                 'note_saq' => $bouteille['note_saq'],
        //                 'region' => $bouteille['region'],
        //                 'type' => $bouteille['type'],
        //             ]
        //         );
        //     }
        // }

        return view('scrapper.index', compact('codes_saq',));
    }
}
