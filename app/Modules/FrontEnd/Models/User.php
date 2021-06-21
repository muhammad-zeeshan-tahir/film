<?php

namespace App\Modules\FrontEnd\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends   Authenticatable
{
    //
    protected $table = 'user';
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
