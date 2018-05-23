<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'communication_type_id', 'user_id','created_by_id', 'title', 'content',
    ];

    public function communication()
    {
        return $this->hasMany('App\CommunicationReceiver');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function user_receiver()
    {
        return $this->belongsTo('App\User', 'user_receiver_id');
    }

    public function status_communication()
    {
        return $this->belongsTo('App\StatusCommunication');
    }
    
    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function communication_type()
    {
        return $this->belongsTo('App\CommunicationType');
    }

    public function status_read()
    {
        return $this->belongsTo('App\StatusRead');
    }
}
