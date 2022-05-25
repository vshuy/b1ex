<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kieutailieu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kieu_tailieus')->insert([
            'name' => 'tai lieu mp3',
            'mo_ta' => 'Dung de luu tru file am thanh',
        ]);
        DB::table('kieu_tailieus')->insert([
            'name' => 'tai lieu hinh anh',
            'mo_ta' => 'Dung de luu tru file hinh anh',
        ]);
    }
}
