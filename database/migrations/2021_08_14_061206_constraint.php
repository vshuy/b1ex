<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dethi_cauhois', function ($table) { //ok no test this part
            $table->foreign('dethi_id')
                ->references('id')->on('dethis')
                ->onDelete('cascade');
            $table->foreign('cauhoi_id')
                ->references('id')->on('cauhois')
                ->onDelete('cascade');
        });
        Schema::table('cauhois', function ($table) {
            $table->foreign('phan_id')
                ->references('id')->on('phans')
                ->onDelete('cascade');
        });
        Schema::table('dapans', function ($table) {
            $table->foreign('cauhoi_id')
                ->references('id')
                ->on('cauhois')
                ->onDelete('cascade');
        });
        Schema::table('tailieu_phans', function ($table) {
            $table->foreign('kieutailieu_id')
                ->references('id')->on('kieu_tailieus')
                ->onDelete('cascade');
            $table->foreign('phan_id')
                ->references('id')->on('phans')
                ->onDelete('cascade');
        });
        Schema::table('tailieu_dapans', function ($table) {
            $table->foreign('kieutailieu_id')
                ->references('id')->on('kieu_tailieus')
                ->onDelete('cascade');
            $table->foreign('dapan_id')
                ->references('id')->on('dapans')
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
        //
    }
}
