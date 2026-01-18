<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pin extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serial', 'package_id', 'batch', 'code', 'status', 'used_date', 'used_by', 'deleted_at', 'created_by'
    ];

    public function agents()
    {
        return $this->belongsTo(Agent::class);
    }

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public  function user()
    {
        return $this->belongsTo(User::class, 'serial', 'membership_id');
    }

    public  function used_by()
    {
        return $this->hasOne(User::class, 'serial');
    }


    protected $dates = ['deleted_at'];
}
