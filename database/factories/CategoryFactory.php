<?php

namespace Database\Factories;

use App\Entities\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $type = ['article','video','product','harvest'];
        $name = $this->faker->sentence($nbWords = 6, $variableNbWords = true);

        return [
            'name'  =>  $name,
            'slug'  =>  Str::slug($name),
            'image' =>  null,
            'type'  =>  $type[rand(0, 3)]
        ];
    }
}
