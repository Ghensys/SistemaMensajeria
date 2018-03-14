<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(array(
        	'description_department' => 'Sistemas',
        	'management_id' => 1
        ));

        Department::create(array(
        	'description_department' => 'Servidores',
        	'management_id' => 1
        ));

        Department::create(array(
        	'description_department' => 'Soporte Tecnico',
        	'management_id' => 1
        ));
    }
}
