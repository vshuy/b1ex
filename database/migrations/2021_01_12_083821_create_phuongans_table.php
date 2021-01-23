<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cauhoi_id')->unsigned();
            $table->integer('tailieu_id')->unsigned();
            $table->text('noidung_pa');
            $table->integer('dapan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('phuongans');
    }
}
