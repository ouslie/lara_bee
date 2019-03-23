<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'id_type',
        'birthyear',
        'id_parent',

    ];

}
