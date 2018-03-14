<?php

use Illuminate\Database\Seeder;
use App\Management;

class ManagementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Tecnología
        Management::create(array(
        	'description_management' => 'Tecnología',
        	'institution_id' => 1
        	));

        //Talento Humano
       Management::create(array(
        	'description_management' => 'Talento Humano',
        	'institution_id' => 1
        	));

        //Bienes Nacionales
        Management::create(array(
        	'description_management' => 'Bienes Nacionales',
        	'institution_id' => 1
        	));
    }
}
