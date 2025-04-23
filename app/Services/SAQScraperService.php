<?php

namespace App\Services;

use Goutte\Client;

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
}
