<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    //

    protected $fillable = [
      'user_id',
      'bonus_type_id',
      'amount',
      'withdrawn',
      'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
