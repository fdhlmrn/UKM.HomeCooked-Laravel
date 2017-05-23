<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('foods', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->index()->unsigned();
          $table->float('latitude')->nullable();
          $table->float('longitude')->nullable();
          $table->string('location')->nullable();
          $table->string('nama_makanan');
          $table->integer('saiz_hidangan');
          $table->string('image');
          $table->double('harga');
          $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
