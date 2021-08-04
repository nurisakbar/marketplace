<?php

namespace Database\Factories;

use App\Entities\Category;
use App\Entities\Harvest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HarvestFactory extends Factory
{
    protected $model = Harvest::class;

    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $title = $this->faker->sentence(rand(3, 5));
        $description = $this->faker->sentence(rand(10,25));

    	return [
            'user_id'       => $user->id,
            'category_id'   => $category->id,
            'title'         => $title,
            'slug'          => Str::slug($title),
            'description'   => $description,
    	];
    }
}
