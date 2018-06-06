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
    }
}
