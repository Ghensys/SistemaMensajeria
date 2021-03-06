<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_institution',
    ];

    public function institution()
    {
    	return $this->hasMany('App\Institution');
    }
}
