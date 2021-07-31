<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\Courier;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couriers = [
            ['name'=>'JNE','active'=>'y','logo'=>'jne.png'],
            ['name'=>'J&T','active'=>'y','logo'=>'jt.png'],
            ['name'=>'Sicepat','active'=>'y','logo'=>'sicepat.png'],
        ];
        
        Courier::insert($couriers);
    }
}
