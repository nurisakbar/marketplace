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
        DB::statement("DROP VIEW IF EXISTS view_wilayah_administratif_indonesia");

        $sql = "database/seeders/wilayah_administratif_indonesia.sql";
        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE')
        ];
        
        exec("mysql --user={$db['username']} --password={$db['password']} --port={$db['port']} --host={$db['host']} --database {$db['database']} < $sql");
    }
}
