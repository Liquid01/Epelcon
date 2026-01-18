<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
   protected $fillable = [
       'name',
       'title',
       'image',
       'status'
   ];

   public function course()
   {
       return $this->hasMany(Course::class);
   }

    public function member_course()
    {
        return $this->hasMany(MemberCourse::class);
    }
}
