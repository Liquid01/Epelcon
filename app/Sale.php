<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    protected $fillable = [
      'user_id',
        'order_by',
        'amount',
        'quantity',
        'payment',
        'product_id',
    ];

    public  function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
