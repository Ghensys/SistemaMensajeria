<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_communication_type',
    ];

    public function communication_type()
    {
        return $this->hasMany('App\CommunicationType');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
