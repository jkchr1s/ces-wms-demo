<?php

namespace App\Http\Controllers\Api;

use App\Clients\TmdbClient;
use App\Http\Controllers\Controller;

class TmdbController extends Controller
{
    /**
     * Returns the movie vote count from TMDB.
     *
     * @param TmdbClient $tmdb
     * @param $tmdbId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function show(TmdbClient $tmdb, $tmdbId)
    {
        if (! preg_match('/^\d+$/', (string)$tmdbId)) {
            abort(404);
        }
        $movie = $tmdb->getMovie($tmdbId);
        return response()->json([
            'name' => $movie['original_title'],
            'vote_average' => $movie['vote_average'],
            'vote_count' => $movie['vote_count']
        ]);
    }
}
