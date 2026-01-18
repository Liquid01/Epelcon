<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $fillable = [
        'name',
        'amount',
        'description',
        'matching_bonus',
        'referral_bonus',
        'pv',
        'status',
    ];

    public function pins(){
        return $this->hasMany(Package::class);
    }

    public function user()
    {
//        return $this->hasMany(User::class, 'id');
    }

//    public function matchings
}
