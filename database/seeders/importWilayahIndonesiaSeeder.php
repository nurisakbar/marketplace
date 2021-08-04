<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class importWilayahIndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents('database/seeders/wilayah_administratif_indonesia.sql'));
    }
}
