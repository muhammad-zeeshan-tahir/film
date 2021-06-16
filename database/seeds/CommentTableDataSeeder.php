<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            'name' => 'Seeder Comment',
            'comment' => 'Test Comment 1',
            'user_id' =>1,
            'film_id'=>2,
            'created_at'=> Carbon::now()
        ]);

        DB::table('comment')->insert([
            'name' => 'Seeder Comment',
            'comment' => 'Test Comment 2',
            'user_id' =>1,
            'film_id'=>2,
            'created_at'=> Carbon::now()
        ]);

        DB::table('comment')->insert([
            'name' => 'Seeder Comment',
            'comment' => 'Test Comment 3',
            'user_id' =>1,
            'film_id'=>3,
            'created_at'=> Carbon::now()
        ]);
    }
}
