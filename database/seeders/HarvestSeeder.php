<?php

namespace Database\Seeders;

use App\Entities\Harvest;
use Illuminate\Database\Seeder;

class HarvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Harvest::factory()->count(10)->create();
    }
}
