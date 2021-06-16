<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class FilmTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('film')->insert([
            'name' => 'Film A',
            'description' => 'Film A belongs to India',
            'release_date' => '2021-05-01',
            'rating' => 2,
            'ticket_price' => '500',
            'country' => 'India',
            'genre_id'=>'1',
            'photo'=>'film/1.jpg',
            'created_at'=> Carbon::now()
        ]);
        DB::table('film')->insert([
            'name' => 'Film B',
            'description' => 'Film A belongs to Pakistan',
            'release_date' => '2021-05-10',
            'rating' => 2,
            'ticket_price' => '500',
            'country' => 'Pakistan',
            'genre_id'=>'1',
            'photo'=>'film/2.jpg',
            'created_at'=> Carbon::now()
        ]);

    }
}
