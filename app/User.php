<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'institution_id', 'management_id', 'department_id', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsAdminAttribute()
    {
        return $this->role_id == 0;
    }

    public function getIsClientAttribute()
    {
        # code...
    }

    public static function SelectUsers($id)
    {
        return User::where('department_id', $id)->get();
    }

    public function user_receiver()
    {
        return $this->hasMany('App\User', 'user_receiver_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function management()
    {
        return $this->belongsTo('App\Management');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
