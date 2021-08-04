<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(HarvestSeeder::class);
        $this->call(CourierSeeder::class);
        $this->call(CouerierServiceSeeder::class);
        $this->call(importWilayahIndonesiaSeeder::class); // kalau error melakukan seeder silahkan import manual
        
    }
}
