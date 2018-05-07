<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_receivers', function (Blueprint $table) {
            $table->increments('id');

            //FK del Mensaje (Titutlo y Llave Primaria);
            $table->integer('communication_id')->unsigned();
            $table->foreign('communication_id')->references('id')->on('communications');
            
            //Usuario que crea el Mensaje;
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            //Usuario que recibe el Mensaje;
            $table->integer('user_receiver_id')->unsigned();
            $table->foreign('user_receiver_id')->references('id')->on('users');

            $table->string('content', 3000)->notnull();
            $table->string('doc_file')->nullable();

            //FK del Estatus de la Comunicacion;
            $table->integer('status_communication_id')->unsigned();
            $table->foreign('status_communication_id')->references('id')->on('status_communications');
            
            //Campo para almacenar la fecha de lectura del mensaje;
            $table->timestamp('read')->nullable();

            //FK de la Prioridad del mensaje;
            $table->integer('priority_id')->unsigned();
            $table->foreign('priority_id')->references('id')->on('priorities');

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
        Schema::dropIfExists('communication_receivers');
    }
}
