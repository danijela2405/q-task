<?php

namespace App\Handler;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class QSSApiHandler
{

    private string $apiUrl;
    private Client $client;

    /**
     * @param string $apiUrl
     */
    public function __construct()
    {
        $this->apiUrl = config('app.q_symfony_api');
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function post(string $endpoint, array $body = [], string $token = null)
    {
        $uri = $this->apiUrl . $endpoint;

        $headers = [];
        if ($token) {
            $headers = [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ];
        }

        $response = $this->client->post($uri, [
            RequestOptions::HEADERS => $headers,
            RequestOptions::JSON => $body,
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode != 200) {
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }

    public function get(string $endpoint, array $query = [])
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

    public function delete(string $endpoint)
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
