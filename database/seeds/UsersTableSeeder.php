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

        //Presidencia
        User::create(array(
        	'name' => 'Presidencia',
        	'email' => 'presidencia@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '2',
            'department_id' => '4',
            'role_id' => 1,
        	));

        //Gerencia
        User::create(array(
        	'name' => 'Gerente',
        	'email' => 'gerente@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '7',
            'role_id' => 2,
        	));

        //Coordinador
        User::create(array(
        	'name' => 'Coordinador',
        	'email' => 'coordinador@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '3',
            'department_id' => '4',
            'role_id' => 3,
        	));

        //Analista
        User::create(array(
        	'name' => 'Analista',
        	'email' => 'analista@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '4',
            'role_id' => 4,
        	));

        User::create(array(
            'name' => 'juan Perez Sistemas 1',
            'email' => 'jperezs1@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Sistemas 2',
            'email' => 'jperezs2@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Sistemas 3',
            'email' => 'jperezs3@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Sistemas 4',
            'email' => 'jperezs4@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Sistemas 5',
            'email' => 'jperezs5@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '1',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Servidores 2',
            'email' => 'jperezss2@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '2',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Servidores 3',
            'email' => 'jperezss3@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '2',
            'role_id' => 4,
            ));

        User::create(array(
            'name' => 'juan Perez Servidores 4',
            'email' => 'jperezss4@conapdis.gob.ve',
            'password' => bcrypt('123456'),
            'institution_id' => '1',
            'management_id' => '1',
            'department_id' => '2',
            'role_id' => 4,
            ));
    }
}
