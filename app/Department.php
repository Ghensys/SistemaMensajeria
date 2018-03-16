<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function Managements()
    {
    	return $this->belongsTo('Management', 'management_id');
    }
}
