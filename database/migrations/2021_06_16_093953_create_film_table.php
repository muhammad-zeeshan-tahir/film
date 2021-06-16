<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('description');
            $table->string('release_date');
            $table->integer('rating');
            $table->string('ticket_price');
            $table->string('country');
            $table->integer('genre_id');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
}
