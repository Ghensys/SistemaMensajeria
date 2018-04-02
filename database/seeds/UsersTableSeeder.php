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
        	'role' => 0,
        	));

        //Presidencia
        User::create(array(
        	'name' => 'Presidencia',
        	'email' => 'presidencia@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
        	'role' => 1,
        	));

        //Gerencia
        User::create(array(
        	'name' => 'Gerente',
        	'email' => 'gerente@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
        	'role' => 2,
        	));

        //Coordinador
        User::create(array(
        	'name' => 'Coordinador',
        	'email' => 'coordinador@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
        	'role' => 3,
        	));

        //Analista
        User::create(array(
        	'name' => 'Analista',
        	'email' => 'analista@conapdis.gob.ve',
        	'password' => bcrypt('123456'),
        	'role' => 4,
        	));
    }
}
