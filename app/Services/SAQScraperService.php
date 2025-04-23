<?php

namespace App\Services;

use Goutte\Client;
use App\Models\Bouteille;

class SAQScraperService
{
    public function chercherVin($url = 'https://www.saq.com/fr/produits/vin')
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $results = [];

        $crawler->filter('.product-item')->each(function ($node) use (&$results) {
            $results[] = [
                'nom' => $node->filter('.product-item-name')->text(),
                'prix' => $node->filter('.price')->text(),
                'url' => $node->filter('a.product-item-link')->attr('href'),
                'img' => $node->filter('img.product-image-photo')->attr('src')
            ];
        });
        return $results;
    }

    public function chercherSAQCodes()
    {
        set_time_limit(0); // Pour éviter les timeouts

        $client = new Client();
        $saq_codes = [];

        for ($page = 1; $page <= 2; $page++) {

            $url = "https://www.saq.com/fr/produits/vin?p=$page&product_list_limit=96";
            $crawler = $client->request('GET', $url);

            $codes = $crawler->filter('.saq-code')->each(function ($node) {
                $spans = $node->filter('span');
                return $spans->count() > 1 ? trim($spans->eq(1)->text()) : null;
            }); // Filtrer les codes SAQ

            $saq_codes = array_merge($saq_codes, $codes);
        }

        return $saq_codes;
    }
}