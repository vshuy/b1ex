<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\AutoImport\AutoInseart;

class CreateTailieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailieus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url');
            $table->text('kieutl');
        });
        $InseartOB = new AutoInseart();
        $InseartOB->inseartMotTaiLieu("", "");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tailieus');
    }
}
