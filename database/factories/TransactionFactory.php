<?php

namespace Database\Factories;

use App\Entities\CourierService;
use App\Entities\Store;
use App\Entities\Transaction;
use App\Entities\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
    	return [
    	    'user_id' => auth()->user()->id ?? 1,
            'store_id' => $this->faker->numberBetween(1, Store::count()),
            'courier_service_id' => $this->faker->numberBetween(1, CourierService::count()),
            'user_address_id' => $this->faker->numberBetween(1, UserAddress::count()),
            'status' => $this->faker->randomElement(Transaction::statusValues()),
            'note' => $this->faker->paragraph(rand(1, 5))
    	];
    }
}
