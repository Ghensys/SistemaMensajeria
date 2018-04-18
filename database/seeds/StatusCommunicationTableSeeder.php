<?php

use Illuminate\Database\Seeder;
use App\StatusCommunication;

class StatusCommunicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusCommunication::create(array(
        	'description_status_communication' => 'Sin leer',
        ));

        StatusCommunication::create(array(
        	'description_status_communication' => 'Aperturado',
        ));

        StatusCommunication::create(array(
            'description_status_communication' => 'Respondido',
        ));

        StatusCommunication::create(array(
        	'description_status_communication' => 'Finalizada',
        ));

        StatusCommunication::create(array(
        	'description_status_communication' => 'Cancelada',
        ));
    }
}
