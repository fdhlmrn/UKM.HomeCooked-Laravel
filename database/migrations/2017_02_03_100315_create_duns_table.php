<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->integer('parliament_id')->unsigned();
            $table->string('name');
            $table->string('code'); // chair id
            $table->timestamps();

            //foreign
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('parliament_id')->references('id')->on('parliaments')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duns');
    }
}