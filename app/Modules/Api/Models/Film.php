<?php

namespace App\Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $table = 'film';
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name','description','release_date','rating','ticket_price','country','genre_id','photo'
    ];
}
