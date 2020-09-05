<?php

namespace App;
use App\Student;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id','id');
    }

    public function getRoleAttribute()
    {
        $id = $this->role_id;
        if($id==1){
            $role = "Admin";
        }else if($id==2){
            $role = "Student";
        }else{
            $role = "Employer";
        }
        return $role;
    }

    public function diffForHumans()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
