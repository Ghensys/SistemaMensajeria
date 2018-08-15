<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_reply',
    ];

    public function replies()
    {
        return $this->belongsTo('App\Reply');
    }
}
