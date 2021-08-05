<?php

namespace Database\Seeders;

use App\Entities\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAddress::factory()->count(5)->create();
    }
}
