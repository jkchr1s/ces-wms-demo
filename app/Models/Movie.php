<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'year' => 'integer',
    ];

    /**
     * A Movie belongs to many Genres.
     *
     * @return BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * A Movie belongs to a Rating.
     *
     * @return BelongsTo
     */
    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }

    /**
     * Scope the query where the Movie belongs to the specified Genre.
     *
     * @param Builder $query
     * @param Genre $genre
     * @return Builder
     */
    public function scopeOfGenre(Builder $query, Genre $genre): Builder
    {
        return $query->whereHas('genres', function ($q) use ($genre) {
            return $q->whereId($genre->id);
        });
    }
}
