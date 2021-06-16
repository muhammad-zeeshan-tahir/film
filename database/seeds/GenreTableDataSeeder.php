<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class GenreTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film_genre')->insert([
            'name' => 'Genre A',
            'created_at'=> Carbon::now()
        ]);
        DB::table('film_genre')->insert([
            'name' => 'Genre B',
            'created_at'=> Carbon::now()
        ]);
        DB::table('film_genre')->insert([
            'name' => 'Genre C',
            'created_at'=> Carbon::now()
        ]);
    }
}
