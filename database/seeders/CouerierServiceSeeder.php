<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\CourierService;

class CouerierServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courierService = [
            ['name'=>'JNE REG','active'=>'y','courier_id'=>1],
            ['name'=>'JNE OK','active'=>'y','courier_id'=>1],
            ['name'=>'J&T REG ','active'=>'y','couerier_id'=>2]
        ];

        CourierService::insert($courierService);
    }
}
