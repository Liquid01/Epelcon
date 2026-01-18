<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    //

    protected $fillable = [
        'name',
        'total_pvs',
        "percentage_split",
        "bonus",
        "incentive",
        "rank_target",
        "target_frequency",
        "target_bonus"
    ];
}
