<?php

use Illuminate\Database\Seeder;
use App\StatusRead;

class StatusReadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusRead::create(array(
            'id' => 2,
        	'description_status_read' => 'Con Mensajes',
        ));

        StatusRead::create(array(
            'id' => 1,
            'description_status_read' => 'Sin Mensajes',
        ));
    }
}
