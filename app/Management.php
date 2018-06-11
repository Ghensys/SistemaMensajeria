<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_management', 'institution_id',
    ];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function management()
    {
        return $this->hasMany('App\Management');
    }
}