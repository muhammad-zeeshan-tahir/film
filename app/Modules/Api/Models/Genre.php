<?php

namespace App\Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $table = 'film_genre';
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'genre'
    ];
}
