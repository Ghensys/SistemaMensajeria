<?php

use Illuminate\Database\Seeder;
use App\CommunicationType;

class CommunicationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communication_types')->delete();

    	//Memos
        CommunicationType::create(array(
        	'description_communication_type' => 'Memo',
        	));

        //Solicitudes
       CommunicationType::create(array(
        	'description_communication_type' => 'Solicitud',
        	));

        //Soporte Tecnico
        CommunicationType::create(array(
        	'description_communication_type' => 'Soporte Tecnico',
        	));
    }
}
