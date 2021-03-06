<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCommunication extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_status_communication', 
    ];

    /*public function communication_receivers()
    {
    	return $this->hasMany('App\CommunicationReceiver', 'status_communication_id');
    }*/

    public function status_communication()
    {
        return $this->hasMany('App\StatusCommunication');
    }
}
