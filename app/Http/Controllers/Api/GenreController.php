<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GenreController extends Controller
{
    /**
     * Retrieves a list of available genres.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Genre::orderBy('name')->get());
    }

    /**
     * Retrieves a random movie of the specified genre.
     *
     * @param Request $request
     * @param Genre $genre
     * @return JsonResponse
     */
    public function show(Request $request, Genre $genre): JsonResponse
    {
        $data = $request->validate([
            'not' => ['nullable', 'integer', Rule::exists('movies', 'id')]
        ]);

        return response()->json(Movie::ofGenre($genre)
            ->when(isset($data['not']), function ($q) use ($data) {
                return $q->where('movies.id', '!=', $data['not']);
            })
            ->with(['genres', 'rating'])
            ->inRandomOrder()
            ->firstOrFail()
        );
    }
}
