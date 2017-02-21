<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_makanan');
            $table->integer('saiz_hidangan');
            $table->string('gambar');
            $table->double('harga');
            $table->string('status');
            $table->string('user_id');
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
        Schema::dropIfExists('makanan');
    }
}
