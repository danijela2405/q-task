<?php

namespace App\Handler;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class QSSApiHandler
{
    /**
     * @var string
     */
    private string $apiUrl;

    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->apiUrl = config('app.q_symfony_api');
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * POST to QSS Api
     */
    public function post(string $endpoint, array $body = [], string $token = null): mixed
    {
        $uri = $this->apiUrl . $endpoint;

        if (!$token) {
            $token = session('login_token');
        }

        try {
            $response = $this->client->post($uri, [
                RequestOptions::HEADERS =>[
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
                RequestOptions::JSON => $body,
            ]);
        }catch (\Exception $exception){
            dump($exception->getMessage());die();
        }

        $statusCode = $response->getStatusCode();
        if ($statusCode != 200) {
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * GET from QSS Api
     */
    public function get(string $endpoint, array $query = []): mixed
    {
        $uri = $this->apiUrl . $endpoint;
        $token = session('login_token');

        $response = $this->client->get($uri, [
            RequestOptions::QUERY => $query,
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode != 200) {
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * DELETE from QSS Api
     */
    public function delete(string $endpoint): bool
    {
        $uri = $this->apiUrl . $endpoint;
        $token = session('login_token');

        $response = $this->client->delete($uri, [
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode != 204) {
            return false;
        }

        return true;
    }
}
