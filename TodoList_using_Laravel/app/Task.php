<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
   protected $fillable = ['title','description','deadline'];

   protected $dates = ['created_at','updated_at','deadline'];

   public function setDeadlineAttribute($date)
    {
        $this->attributes['deadline'] = Carbon::parse($date);
    }
    public function getDeadlineAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }

}


