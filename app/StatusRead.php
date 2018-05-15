<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_status_read', 
    ];

    public function status_read()
    {
        return $this->hasMany('App\StatusRead');
    }
}
