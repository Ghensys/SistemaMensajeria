<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->delete();


    	//Administrador
        User::create(array(
        	'name' => 'Admin',
        	'email' => 'admin@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
        	));

        User::create(array(
            'name' => 'Ghensys Valero',
            'email' => 'gvalero@conapdis.gob.ve',
            'password' => bcrypt('!Conapdis1'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Yancarlos Rivas',
            'email' => 'yrivas@conapdis.gob.ve',
            'password' => bcrypt('Yrivas123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Dianora Guzman',
            'email' => 'dguzman@conapdis.gob.ve',
            'password' => bcrypt('Dguzman123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Angely Garcia',
            'email' => 'agarcia@conapdis.gob.ve',
            'password' => bcrypt('Agarcia123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Gianvel Velandia',
            'email' => 'gvelandia@conapdis.gob.ve',
            'password' => bcrypt('Gvelandia123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Mariam Paredes',
            'email' => 'mparedes@conapdis.gob.ve',
            'password' => bcrypt('Mparedes123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));

        User::create(array(
            'name' => 'Ramon Cristancho',
            'email' => 'rcristancho@conapdis.gob.ve',
            'password' => bcrypt('ramon123'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 0,
            ));
       
    }
}
