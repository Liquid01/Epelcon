<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    //

    protected $fillable = [
        'user_id',
        'left_pvs',
        'right_pvs',
        'package_id',
        'matched',
        'amount'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
