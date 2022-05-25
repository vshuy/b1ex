<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauhoiLythuyetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhoi_lythuyets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lythuyet_id')->unsigned();
            $table->text('noidung_cauhoi');
        });
        Schema::table('cauhoi_lythuyets', function ($table) {
            $table->foreign('lythuyet_id')
                ->references('id')
                ->on('ly_thuyets')
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
        Schema::dropIfExists('cauhoi_lythuyets');
    }
}
