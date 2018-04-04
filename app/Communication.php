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
        'communication_id', 'from_id', 'to_id', 'status_id',
    ];
}
