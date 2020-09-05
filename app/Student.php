<?php

namespace App;
use App\College;
use App\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id','firstname','middlename','lastname'];

    public function getNameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }

    public function college()
    {
        return $this->hasOne(College::class , 'id', 'college_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class , 'id', 'course_id');
    }

    public function diffForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
