<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Manager;

class Product extends Model
{
    //
    protected $guarded = [];


    public  function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
