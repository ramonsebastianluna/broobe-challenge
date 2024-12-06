<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PageSpeedInsightService
{
    protected $client;
    protected $endpoint;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com/pagespeedonline/v5/',
        ]);

        $this->endpoint = 'runPagespeed';
    }

    public function fetchPageSpeedData(string $url, string $strategy, array $categories = [])
    {
        $defaultCategories = ['ACCESSIBILITY', 'BEST_PRACTICES', 'PERFORMANCE', 'PWA', 'SEO'];

        // filtra si se pasan categorias incorrectas.
        $filteredCategories = array_intersect($defaultCategories, $categories);

        try {
            $response = $this->client->request('GET', $this->endpoint, [
                'query' => [
                    'url' => $url,
                    'key' => config('services.google.api_key'),
                    'category' => $filteredCategories,
                    'strategy' => $strategy,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $errorBody = $e->getResponse()->getBody()->getContents();
                throw new \Exception('API error: ' . $errorBody);
            }
            throw new \Exception('Error connecting to PageSpeed Insights API');
        }
    }
}
