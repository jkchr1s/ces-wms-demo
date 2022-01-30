<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * Ensure that the root URL returns a 200 and loads the appropriate scripts and stylesheets.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(route('home'))
            ->assertSee('base.js')
            ->assertSee('spa.js')
            ->assertSee('app.css')
            ->assertStatus(200);
    }
}
