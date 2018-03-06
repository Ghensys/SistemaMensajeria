<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description_communication_type', 50)->notnull();
            $table->integer('reply_id')->unsigned();
            $table->foreign('reply_id')->references('id')->on('replies');
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
        Schema::dropIfExists('communication_types');
    }
}
