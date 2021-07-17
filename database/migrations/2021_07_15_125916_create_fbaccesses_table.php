<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFbaccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbaccesses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('url_avatar');
            $table->text('user_id');
            $table->text('access_token');
            $table->bigInteger('expiresIn');
            $table->float('part1');
            $table->float('part2');
            $table->float('part3d1');
            $table->float('part3d2');
            $table->float('part4');
            $table->float('part5');
            $table->float('part6');
            $table->float('part7');
            $table->float('part8');
            $table->float('part9');
            $table->float('part10');
            $table->float('part11');
            $table->float('part12');
            $table->float('part13');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fbaccesses');
    }
}
