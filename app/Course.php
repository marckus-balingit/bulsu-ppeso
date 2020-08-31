<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','college_id'];

    public function diffForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
    
}
