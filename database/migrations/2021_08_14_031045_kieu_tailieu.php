<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KieuTailieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kieu_tailieus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('mo_ta');
        });

        DB::table('kieu_tailieus')->insert([
            'name' => 'mp3',
            'mo_ta' => 'Dung de luu tru file am thanh',
        ]);
        DB::table('kieu_tailieus')->insert([
            'name' => 'png',
            'mo_ta' => 'Dung de luu tru file hinh anh',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kieu_tailieus');
    }
}
