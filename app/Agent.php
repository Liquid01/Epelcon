<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //

    protected $fillable = [
        'username',
        'paid',
        'commission',
        'capacity',
        'Withrawn'
        ];



    public function pin()
    {
        return $this->belongsTo(Pin::class);
    }


    public  function user()
    {
        return $this->belongsTo(User::class);
    }
}
