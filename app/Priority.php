<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_priority',
    ];

    public function priority()
    {
    	return $this->hasMany('App\CommunicationReceiver');
    }
}
