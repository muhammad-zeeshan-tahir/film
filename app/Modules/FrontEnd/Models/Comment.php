<?php

namespace App\Modules\FrontEnd\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    //
    protected $table = 'comment';
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'comment',
    ];
}
