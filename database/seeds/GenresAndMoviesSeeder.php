<?php

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class GenresAndMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pg = Rating::firstOrCreate(['name' => 'PG'])->id;
        $pg13 = Rating::firstOrCreate(['name' => 'PG-13'])->id;
        $r = Rating::firstOrCreate(['name' => 'R'])->id;

        $data = [
            'Action' => [
                [
                    'name' => 'Black Panther',
                    'release_year' => 2018,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/black_panther_2018',
                    'critic_notes' => "Black Panther elevates superhero cinema to thrilling new heights while telling one of the MCU's most absorbing stories -- and introducing some of its most fully realized characters.",
                    'img_url' => 'https://resizing.flixster.com/sq4KPvdSh1KVV09hAKrj843o7jE=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzQwN2Q5YTA4LThiYjctNDE0ZS1iZWQ2LWFkYzM1ZjE2MzU2My53ZWJw',
                    'tmdb_id' => 284054
                ],
                [
                    'name' => 'Avengers Endgame',
                    'release_year' => 2019,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/avengers_endgame',
                    'critic_notes' => "Exciting, entertaining, and emotionally impactful, Avengers: Endgame does whatever it takes to deliver a satisfying finale to Marvel's epic Infinity Saga.",
                    'img_url' => 'https://resizing.flixster.com/OSBmQRe7YpPg99iP_jf_bnBHwgA=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzL2VmNzczOWVkLTBhZTgtNGFmYy1iZmQyLTA2ZTNjNGIxMGRhYi53ZWJw',
                    'tmdb_id' => 299534
                ],
                [
                    'name' => 'Mission Impossible -- Fallout',
                    'release_year' => 2018,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/mission_impossible_fallout',
                    'critic_notes' => "Fast, sleek, and fun, Mission: Impossible - Fallout lives up to the \"impossible\" part of its name by setting yet another high mark for insane set pieces in a franchise full of them.",
                    'img_url' => 'https://flxt.tmsimg.com/assets/p13492451_i_h8_aa.jpg',
                    'tmdb_id' => 353081
                ]
            ],
            'Horror' => [
                [
                    'name' => 'Us',
                    'release_year' => 2019,
                    'rating_id' => $r,
                    'info_url' => 'https://www.rottentomatoes.com/m/us_2019',
                    'critic_notes' => "With Jordan Peele's second inventive, ambitious horror film, we have seen how to beat the sophomore jinx, and it is Us.",
                    'img_url' => 'https://resizing.flixster.com/ppEpZFLP2UBPdRLwAY69I8ktIjk=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzL2VjMmYxNjQwLTlkN2EtNDMwYi1hZGIzLTc0OTRjN2U5OTk4YS53ZWJw',
                    'tmdb_id' => 458723
                ],
                [
                    'name' => 'Get Out',
                    'release_year' => 2017,
                    'rating_id' => $r,
                    'info_url' => 'https://www.rottentomatoes.com/m/get_out',
                    'critic_notes' => "Funny, scary, and thought-provoking, Get Out seamlessly weaves its trenchant social critiques into a brilliantly effective and entertaining horror/comedy thrill ride.",
                    'img_url' => 'https://flxt.tmsimg.com/assets/p13365032_v_h9_aa.jpg',
                    'tmdb_id' => 419430
                ],
                [
                    'name' => 'A Quiet Place',
                    'release_year' => 2018,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/a_quiet_place_2018',
                    'critic_notes' => "A Quiet Place artfully plays on elemental fears with a ruthlessly intelligent creature feature that's as original as it is scary -- and establishes director John Krasinski as a rising talent.",
                    'img_url' => 'https://resizing.flixster.com/x74k9tPhw96mGIgnsPbFoug9xRk=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzL2RlYWRlMzEyLThkZDYtNGUwZi1hMzVjLTU4YmJkNGM4YzQ4NS53ZWJw',
                    'tmdb_id' => 447332
                ],
            ],
            'Comedy' => [
                [
                    'name' => 'Groundhog Day',
                    'release_year' => 1993,
                    'rating_id' => $pg,
                    'info_url' => 'https://www.rottentomatoes.com/m/groundhog_day',
                    'critic_notes' => "Smart, sweet, and inventive, Groundhog Day highlights Murray's dramatic gifts while still leaving plenty of room for laughs.",
                    'img_url' => 'https://flxt.tmsimg.com/assets/p14569_k_h10_ad.jpg',
                    'tmdb_id' => 137
                ],
                [
                    'name' => 'Black Sheep',
                    'release_year' => 1996,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/1069419-black_sheep',
                    'critic_notes' => "Chris Farley and David Spade reunite to diminishing returns in Black Sheep, a comedic retread that succumbs to a woolly plot and sophomoric jokes.",
                    'img_url' => 'https://flxt.tmsimg.com/assets/p17656_i_h9_aa.jpg',
                    'tmdb_id' => 3603
                ],
                [
                    'name' => 'Step Brothers',
                    'release_year' => 2008,
                    'rating_id' => $r,
                    'info_url' => 'https://www.rottentomatoes.com/m/1193743-step_brothers',
                    'critic_notes' => "Step Brothers indulges in a cheerfully relentless immaturity that will quickly turn off viewers unamused by Ferrell and Reilly -- and delight those who find their antics hilarious.",
                    'img_url' => 'https://resizing.flixster.com/nnElqCdvgo5TzdXqrqDyb37MxOE=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzVjNWFhMzE0LTFlMzgtNDRlMy04MWZkLTA3ZGFmMmFkYmE0NS53ZWJw',
                    'tmdb_id' => 12133
                ]
            ],
            'Science Fiction' => [
                [
                    'name' => 'Star Wars: The Last Jedi',
                    'release_year' => 2017,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/star_wars_the_last_jedi',
                    'critic_notes' => "Star Wars: The Last Jedi honors the saga's rich legacy while adding some surprising twists -- and delivering all the emotion-rich action fans could hope for.",
                    'img_url' => 'https://flxt.tmsimg.com/assets/p11597936_k_h9_ab.jpg',
                    'tmdb_id' => 181808
                ],
                [
                    'name' => 'Avatar',
                    'release_year' => 2009,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/avatar',
                    'critic_notes' => "It might be more impressive on a technical level than as a piece of storytelling, but Avatar reaffirms James Cameron's singular gift for imaginative, absorbing filmmaking.",
                    'img_url' => 'https://resizing.flixster.com/6aHD8uehGr76vwUAc7bDsIYGr7o=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzL2IzNzVhY2RlLTgzM2QtNDhlYy04MTNiLTUzMGE5OTVhMzQzNi53ZWJw',
                    'tmdb_id' => 19995
                ],
                [
                    'name' => 'Star Trek Into Darkness',
                    'release_year' => 2013,
                    'rating_id' => $pg13,
                    'info_url' => 'https://www.rottentomatoes.com/m/star_trek_into_darkness',
                    'critic_notes' => "Visually spectacular and suitably action packed, Star Trek Into Darkness is a rock-solid installment in the venerable sci-fi franchise, even if it's not as fresh as its predecessor.",
                    'img_url' => 'https://resizing.flixster.com/1Dq_qr6ZZ9pjDG2Mhl0y9EKQB2g=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzQ5YjdmZjM3LTUzMmMtNGE5My04N2I5LTJmZWFlODRkZGQ0ZC53ZWJw',
                    'tmdb_id' => 54138
                ]
            ]
        ];

        foreach ($data as $genre => $movies) {
            $genre = Genre::firstOrCreate(['name' => $genre]);
            foreach ($movies as $movie) {
                $item = collect($movie);
                $movie = Movie::firstOrCreate([
                    'name' => $movie['name']
                ], $item->except('name')->toArray());
                $genre->movies()->attach($movie);
            }
        }
    }
}
