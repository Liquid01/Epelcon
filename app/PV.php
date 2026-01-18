<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PV extends Model
{
    //

    protected $fillable =
        [
            'user_id',
            'left',
            'right',
            'direct',
            'left_extra',
            'right_extra'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'pvs';
}
