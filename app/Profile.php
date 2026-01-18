<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = [
      'user_id',
      'address',
      'address2',
      'country',
      'city',
      'state',
      'nok',
      'nok_phone',
      'dob',
      'id_type',
      'id_number',
      'validated',
      'status',
    ];


    public  function user()
    {
        return $this->belongsTo(User::class);
    }
}
