<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailieuTasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailieu_tas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->text('name_post');
            $table->timestamps();
            $table->bigInteger('views');
            $table->longText('contents_post');
        });
        Schema::table('tailieu_tas', function ($table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('loai_tailieu_tas')
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
        Schema::dropIfExists('tailieu_tas');
    }
}
