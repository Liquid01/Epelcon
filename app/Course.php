<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'price',
        'student_price',
        'member_price',
        'graduate_price',
        'other_price',
        'duration',
        'description',
        'duration',
        'discipline_id',
        'status',
        'code',
    ];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }


}
