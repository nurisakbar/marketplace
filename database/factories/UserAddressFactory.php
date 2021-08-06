<?php

namespace Database\Factories;

use App\Entities\UserAddress;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;

    public function definition(): array
    {
        $default  = ['y', 'n'];
        $user     = User::inRandomOrder()->first();
        $village  = Village::inRandomOrder()->first();
        $address  = $this->faker->sentence(rand(10, 10));

        return [
            'user_id'       => $user->id,
            'lebel'         => $this->faker->sentence(1),
            'address'       => $address,
            'phone'         => $this->faker->numerify('###-###########'),
            'name'          => $this->faker->word(5),
            'village_id'    => $village->id,
            'default'       => $default[rand(0, 1)],
        ];
    }
}
