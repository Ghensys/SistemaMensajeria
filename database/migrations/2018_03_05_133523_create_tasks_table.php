<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            //ID de la comunicacion principal
            $table->integer('communication_id')->unsigned();
            $table->foreign('communication_id')->references('id')->on('communications');

            //ID del mensaje enviado (Primer Nivel)
            $table->integer('communication_receiver_id')->unsigned();
            $table->foreign('communication_receiver_id')->references('id')->on('communication_receivers');

            //Creador de la Tarea
            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users');
            
            //Receptor de la Tarea
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users');

            //Estado de la Tarea
            $table->integer('status_task_id')->unsigned();
            $table->foreign('status_task_id')->references('id')->on('status_tasks');

            //Comentario sobre la tarea
            $table->string('comment_task');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
