<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCourse extends Model
{
   protected  $fillable = [
       'user_id',
       'discipline_id',
       'courses',
       'completion',
       'status',
       'start_date'
       ];



   public function discipline()
   {
       return $this->belongsTo(Discipline::class);
   }
}



