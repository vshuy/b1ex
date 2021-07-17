<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dethi_id')->unsigned();
            $table->text('ten_phan');
            $table->integer('tailieujpg_id')->unsigned();
            $table->integer('tailieump3_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phans');
    }
}
