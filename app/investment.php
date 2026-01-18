<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class investment extends Model
{
    protected $fillable = [
        'membership_id', 'paid_from', 'duration', 'amount', 'due_date', 'interest', 'status', 'created_at', 'updated_at'
    ];
}
