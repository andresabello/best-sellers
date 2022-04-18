<?php

namespace App\Services;

use App\Http\Requests\GetNYTBestSellerRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NYTService
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     */
    public function getBooks(GetNYTBestSellerRequest $request): array
    {
        $params = $request->all();

        $response = $this->client->get('https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json', [
            'headers' => ['Accept' => 'application/json'],
            'query' => array_merge($params, [
                'api-key' => config('services.nytimes.api')
            ])
        ]);
        $body = (string)$response->getBody();
        return json_decode($body, true);
    }
}
