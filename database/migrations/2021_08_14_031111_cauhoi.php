<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cauhoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhois', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phan_id')->unsigned();
            $table->integer('dethi_goc_id')->unsigned();
            $table->boolean('chua_pa_nhieu');
            $table->text('noidung_cauhoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cauhois');
    }
}
