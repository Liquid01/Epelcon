<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Savings extends Model
{
    use Notifiable;

    use  SoftDeletes;
    protected $fillable = [
        'username',
        'plan_name',
        'type',
        'duration',
        'amount',
        'interest',
        'interest',
        'due_date',
        'status',
        'updated_by',
        'updated_at',
        'created_at',
        'withdrawal_date',
        'reinvested_date',
        'deleted_at',
    ];


    protected function savings_type()
    {
        return $this->belongsTo(SavingsType::class);
    }

    protected $dates = ['deleted_at'];
}
