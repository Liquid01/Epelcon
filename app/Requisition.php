<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    //

    protected $fillable = ['subject', 'body', 'user_id', 'status'];
}
