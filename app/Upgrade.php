<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    //

    protected $fillable = [
        'user_id',
        'old_package',
        'new_package',
        'by',
        'status'
    ];
}
