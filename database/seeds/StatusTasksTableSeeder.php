<?php

use Illuminate\Database\Seeder;
use App\StatusTask;

class StatusTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusTask::create(array(
        	'description_status_task' => 'Sin leer',
        ));

        StatusTask::create(array(
        	'description_status_task' => 'En proceso',
        ));

        StatusTask::create(array(
        	'description_status_task' => 'Finalizada',
        ));

        StatusTask::create(array(
        	'description_status_task' => 'Cancelada',
        ));
    }
}
