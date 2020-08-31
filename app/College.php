<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['name','abbreviation','file_logo'];

    public function course()
    {
        return $this->hasMany(Course::class, 'college_id','id');
    }

    public function abbreviate()
    {
        return strtoupper($this->abbreviation);
    }

    public function diffForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
