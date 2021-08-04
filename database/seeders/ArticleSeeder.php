<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\Article::factory()->count(15)->create();
    }
}
