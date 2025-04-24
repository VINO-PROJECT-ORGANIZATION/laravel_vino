<?php

namespace App\Http\Controllers;

use App\Services\SAQScraperService;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(SAQScraperService $scraper)
    {
        $codes_saq = $scraper->chercherSAQCodes();
        $bouteilles = $scraper->chercherBouteilles($codes_saq);
        // Enregistrer les bouteilles dans la base de données
        return view('scrapper.index', compact('codes_saq', 'bouteilles'));
    }
}
