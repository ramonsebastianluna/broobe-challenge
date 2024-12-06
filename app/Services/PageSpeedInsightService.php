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
        try {
            $categoriesQuery = implode('&category=', $categories); // Convierte el array en parámetros repetidos
            $queryString = "url={$url}&key=" . config('services.google.api_key') . "&category={$categoriesQuery}&strategy={$strategy}";
            
            $response = $this->client->request('GET', $this->endpoint . '?' . $queryString);
            
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
