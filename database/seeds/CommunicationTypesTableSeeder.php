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
            'reply_id' => 2,
        	));

        //Solicitudes
       CommunicationType::create(array(
        	'description_communication_type' => 'Solicitud',
            'reply_id' => 1,
        	));

        //Soporte Tecnico
        CommunicationType::create(array(
        	'description_communication_type' => 'Soporte Tecnico',
            'reply_id' => 1,
        	));
    }
}
