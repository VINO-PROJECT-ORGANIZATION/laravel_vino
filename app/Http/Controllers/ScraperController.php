<?php

namespace App\Http\Controllers;

use App\Services\SAQScraperService;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(SAQScraperService $scraper)
    {
        $bouteilles = $scraper->chercherVin();
        return view('scrapper.index', compact('bouteilles'));
    }
}