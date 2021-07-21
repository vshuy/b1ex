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
            $table->foreign('dethi_id')
                ->references('id')
                ->on('dethis')
                ->onDelete('cascade');
        });
        Schema::table('cauhois', function ($table) {
            $table->foreign('phan_id')
                ->references('id')->on('phans')
                ->onDelete('cascade');
        });
        Schema::table('phuongans', function ($table) {
            $table->foreign('cauhoi_id')
                ->references('id')
                ->on('cauhois')
                ->onDelete('cascade');
        });
        Schema::table('tailieus', function ($table) {
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
