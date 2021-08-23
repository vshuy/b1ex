<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TailieuDapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailieu_dapans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kieutailieu_id')->unsigned();
            $table->integer('dapan_id')->unsigned();
            $table->text('url');
        });
        // $InseartOB = new AutoInseart();
        // $InseartOB->inseartMotTaiLieu("", "");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tailieu_dapans');
    }
}
