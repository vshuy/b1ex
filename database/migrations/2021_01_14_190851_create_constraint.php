<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('phans', function ($table) {
            $table->foreign('dethi_id')->references('id')->on('dethis');
            $table->foreign('tailieujpg_id')->references('id')->on('tailieus');
            $table->foreign('tailieump3_id')->references('id')->on('tailieus');
        });
        Schema::table('cauhois', function ($table) {
            $table->foreign('phan_id')->references('id')->on('phans');
        });
        Schema::table('phuongans', function ($table) {
            $table->foreign('cauhoi_id')->references('id')->on('cauhois');
            $table->foreign('tailieu_id')->references('id')->on('tailieus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
