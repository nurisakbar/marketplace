<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Forum;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forum::factory()->count(15)->create();
    }
}
