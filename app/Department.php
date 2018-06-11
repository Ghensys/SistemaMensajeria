<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'description_department', 'management_id',
    ];

    public static function SelectDepartments($id)
    {
    	return Department::where('management_id', $id)->get();
    }

    public function management()
    {
        return $this->belongsTo('App\Management');
    }
}
