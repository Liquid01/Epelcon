<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingsType extends Model
{
    protected $fillable = [
        'name',
        'percentage_interest',
        'due_percentage',
        'min_duration',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
    ];


    public function savings()
    {
        return $this->hasMany(Savings::class);
    }

}
