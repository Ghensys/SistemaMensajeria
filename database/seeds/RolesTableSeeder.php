<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(array(
        	'id' => 0,
        	'description_role' => 'Admin',
        ));

        Role::create(array(
        	'id' => 1,
        	'description_role' => 'Presidencia',
        ));

        Role::create(array(
        	'id' => 2,
        	'description_role' => 'Gerente',
        ));

        Role::create(array(
        	'id' => 3,
        	'description_role' => 'Coordinador',
        ));

        Role::create(array(
        	'id' => 4,
        	'description_role' => 'Analista',
        ));
    }
}
