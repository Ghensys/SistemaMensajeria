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
            $table->integer('communication_id')->unsigned();
            $table->foreign('communication_id')->references('id')->on('communications');
            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users');
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status_communications');
            $table->timestamp('read')->nullable();
            $table->integer('priority_id')->unsigned();
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->string('answer')->nullable();

            //Pendiente terminar las estructuras de las tablas

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
