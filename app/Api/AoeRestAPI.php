<?php

namespace App\Api;

use GuzzleHttp\Client;


class AoeRestAPI
{
    protected $url;
    protected $client;
    protected $headers;

    public function __construct()
    {
        $this->url = 'https://age-of-empires-2-api.herokuapp.com/api/v1/';
        $this->client = new Client();
        $this->headers = [
            'content-type' => 'application/json',
        ];
    }

    #A reusable function to handle GET requests made to the AOE API
    public function get(string $uri = null,  array $query = [])
    {
        $full_path = $this->url . $uri;

        $request = $this->client->get($full_path, [
            'headers'         => $this->headers,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
            'query' => $query
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return (object) json_decode($response);
        }

        return null;
    }
}
