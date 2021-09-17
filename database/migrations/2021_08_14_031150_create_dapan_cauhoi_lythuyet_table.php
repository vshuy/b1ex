<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDapanCauhoiLythuyetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapan_cauhoi_lythuyets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cauhoi_id')->unsigned();
            $table->text('noidung_dapan');
            $table->integer('dapan');
        });
        Schema::table('dapan_cauhoi_lythuyets', function ($table) {
            $table->foreign('cauhoi_id')
                ->references('id')
                ->on('cauhoi_lythuyets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dapan_cauhoi_lythuyets');
    }
}
