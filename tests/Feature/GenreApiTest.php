<?php

namespace Tests\Feature;

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // seed the database
        $this->seed();
    }

    /**
     * Ensure the genre.index route returns a 200 and lists all Genres.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(route('genre.index'))
            ->assertJsonCount(Genre::count())
            ->assertSee('Action')
            ->assertStatus(200);
    }

    /**
     * Ensure the genre.show route returns a movie with no query parameter.
     *
     * @return void
     */
    public function testShow()
    {
        $genre = Genre::first();
        $this->get(route('genre.show', [$genre]))
            ->assertSee('critic_notes')
            ->assertStatus(200);
    }

    /**
     * Ensure the genre.show route with filtered query parameter returns a 200.
     *
     * @return void
     */
    public function testShowFiltered()
    {
        $genre = Genre::with([
            'movies' => function($q) {
                return $q->limit(1);
            }
        ])->first();

        $this->get(route('genre.show', ['genre' => $genre, 'not' => $genre->movies[0]->id]))
            ->assertSee('critic_notes')
            ->assertStatus(200);
    }

    /**
     * Attempt to load a genre that does not exist. This should fail with a 404.
     *
     * @return void
     */
    public function testShowShouldFail()
    {
        $max = Genre::max('id');
        $this->get(route('genre.show', [$max+1]))
            ->assertStatus(404);
    }
}
