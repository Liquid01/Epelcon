<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use Notifiable;
    //

    protected $fillable = ['type', 'for', 'amount', 'status', 'data', 'created_at', 'created_by', 'updated_at', 'owner'];


}


