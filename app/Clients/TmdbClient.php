<?php

namespace App\Clients;

use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class TmdbClient
{
    /** @var Client */
    protected $client;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Request information about a movie.
     *
     * @param string $movieId
     * @param array $options
     * @return array
     * @throws Exception
     */
    public function getMovie(string $movieId, array $options = []): array
    {
        $resp = $this->client->get("https://api.themoviedb.org/3/movie/{$movieId}", array_merge($options, [
            'query' => [
                'api_key' => config('app.tmdb_api_key')
            ]
        ]));
        if ($resp->getStatusCode() !== 200) {
            throw new Exception("tmdb returned code: {$resp->getStatusCode()}");
        }
        if (! preg_match('/^application\/json/i', $resp->getHeaderLine('Content-Type'))) {
            throw new Exception("tmdb returned unexpected response type");
        }
        return json_decode((string)$resp->getBody(), true);
    }
}
