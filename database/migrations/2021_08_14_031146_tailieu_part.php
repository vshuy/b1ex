<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TailieuPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailieu_phans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kieutailieu_id')->unsigned();
            $table->integer('phan_id')->unsigned();
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
        Schema::dropIfExists('tailieu_phans');
    }
}
