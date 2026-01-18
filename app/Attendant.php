<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'seat', 'ticket_id', 'phone'];
}
