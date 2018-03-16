<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    public function Departaments()
    {
    	return $this->hasMany('Department');
    }
}
