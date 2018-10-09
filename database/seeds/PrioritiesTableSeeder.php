<?php

use Illuminate\Database\Seeder;
use App\Priority;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create(array(
            'id' => 1,
            'description_priority' => 'Sin Asignar',
        ));

        Priority::create(array(
            'id' => 2,
        	'description_priority' => 'Normal',
        ));

        Priority::create(array(
            'id' => 3,
        	'description_priority' => 'Urgente',
        ));

        Priority::create(array(
            'id' => 4,
        	'description_priority' => 'Baja',
        ));
    }
}
