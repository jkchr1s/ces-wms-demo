<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rating_id');
            $table->string('name')->comment('Movie name');
            $table->integer('release_year')->comment('Movie release year');
            $table->string('img_url')->comment('Image URL from Rotten Tomatoes');
            $table->string('info_url')->comment('Rotten Tomatoes URL');
            $table->unsignedBigInteger('tmdb_id')->comment('TMDB movie id');
            $table->text('critic_notes');
            $table->timestamps();

            $table->foreign('rating_id')
                ->references('id')
                ->on('ratings');

            $table->unique(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
