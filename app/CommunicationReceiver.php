<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationReceiver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'communication_id', 'user_receiver_id', 'status_communication_id', 'read', 'priority_id', 'answer',
    ];

    public function status_communication()
    {
        return $this->belongsTo('App\StatusCommunication');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /*public function user()
    {
        return $this->belongsTo('App\User');
    }*/

    public function user_receiver()
    {
        return $this->belongsTo('App\User', 'user_receiver_id');
    }

    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function communication()
    {
        return $this->belongsTo('App\Communication');
    }

    public function communication_type()
    {
        return $this->belongsTo('App\CommunicationType');
    }
}
