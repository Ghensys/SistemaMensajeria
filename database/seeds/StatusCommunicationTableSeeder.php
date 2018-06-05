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
            'id' => 1,
        	'description_status_communication' => 'Sin leer',
        ));

        StatusCommunication::create(array(
            'id' => 2,
        	'description_status_communication' => 'Aperturado',
        ));

        StatusCommunication::create(array(
            'id' => 3,
            'description_status_communication' => 'Respondido',
        ));

        StatusCommunication::create(array(
            'id' => 4,
        	'description_status_communication' => 'Respuesta Leída',
        ));

        StatusCommunication::create(array(
            'id' => 5,
        	'description_status_communication' => 'Cancelada',
        ));
    }
}
