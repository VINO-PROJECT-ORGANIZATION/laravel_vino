<?php

namespace App\Http\Controllers;

use App\Services\SAQScraperService;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index(SAQScraperService $scraper)
    {
        $codes_saq = $scraper->chercherSAQCodes();
        return view('scrapper.index', compact('codes_saq'));
    }
}