<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

    protected $fillable = [
      'name',
      'user_id',
      'address1',
      'address2',
      'city',
      'state',
      'phone',
      'phone2',
      'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
