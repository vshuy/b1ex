<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLythuyetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ly_thuyets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loai_lythuyet_id')->unsigned();
            $table->text('ten_lythuyet');
            $table->timestamps();
            $table->bigInteger('views');
            $table->longText('noidung_lythuyet');
        });
        Schema::table('ly_thuyets', function ($table) {
            $table->foreign('loai_lythuyet_id')
                ->references('id')
                ->on('loai_lythuyets')
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
        Schema::dropIfExists('ly_thuyets');
    }
}
