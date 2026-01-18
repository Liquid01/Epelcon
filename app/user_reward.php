<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_reward extends Model
{
    protected $fillable = [
        'membership_id', 'shopping', 'cash', 'points', 'left_pvs', 'right_pvs', 'other_rewards', 'created_at', 'updated_at'
    ];

    public  function user()
    {
        return $this->belongsTo(User::class, 'membership_id');
    }
}
