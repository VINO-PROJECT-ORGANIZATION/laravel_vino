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
        $codes_saq = [];

        for ($page = 1; $page <= 2; $page++) {

            $url = "https://www.saq.com/fr/produits/vin?p=$page&product_list_limit=24";
            $crawler = $client->request('GET', $url);

            $codes = $crawler->filter('.saq-code')->each(function ($node) {
                $spans = $node->filter('span');
                return $spans->count() > 1 ? trim($spans->eq(1)->text()) : null;
            }); // Filtrer les codes SAQ

            $codes_saq = array_merge($codes_saq, $codes);
        }

        return $codes_saq;
    }

    public function nettoyerPrix($prix)
    {
        // Enlève les caractères non numériques et remplace la virgule par un point
        $prix = preg_replace('/[^\d,]/', '', $prix);
        $prix = str_replace(',', '.', $prix);

        return floatval($prix);
    }

    public function chercherBouteilles(array $codes_saq)
    {
        set_time_limit(0); // Pour éviter les timeouts

        $client = new Client();
        $bouteilles = [];

        foreach ($codes_saq as $code_saq) {
            $url = "https://www.saq.com/fr/$code_saq";

            try {
                $crawler = $client->request('GET', $url);
                $nom = $crawler->filter('h1.page-title')->count() ? trim($crawler->filter('h1.page-title')->text()) : 'Nom inconnu';
                $url_image = $crawler->filter('img[itemprop="image"]')->count() ? $crawler->filter('img[itemprop="image"]')->attr('src') : null;
                $pays = $crawler->filter('.product.attribute.country .type')->count() ? trim($crawler->filter('.product.attribute.country .type')->text()) : 'Pays inconnu';
                $prix_saq = $crawler->filter('.price')->count() ? trim($crawler->filter('.price')->text()) : 'Prix inconnu';
                $format = $crawler->filter('.product.attribute.format .type')->count() ? trim($crawler->filter('.product.attribute.format .type')->text()) : 'Format inconnu';
                $type = $crawler->filter('.product.attribute.identity .type')->count() ? trim($crawler->filter('.product.attribute.identity .type')->text()) : 'Type inconnu';

                $bouteilles[] = [
                    'code_saq' => $code_saq,
                    'nom' => $nom,
                    'pays' => $pays,
                    'prix_saq' => $this->nettoyerPrix($prix_saq),
                    'url_image' => $url_image,
                    'format' => $format,
                    'type' => $type,

                ];
            } catch (\Exception $e) {
                echo "Erreur pour $code_saq : " . $e->getMessage() . "\n";
                continue;
            }
        }

        return $bouteilles;
    }
}
