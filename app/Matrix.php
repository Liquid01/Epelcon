<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    //

    protected $fillable = [
        'username', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6',
        'level_1', 'level_2', 'SDB'
    ];
}
