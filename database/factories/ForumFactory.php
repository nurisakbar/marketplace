<?php

namespace Database\Factories;
use App\Entities\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Model;

class ForumFactory extends Factory
{
    protected $model = Model::class;

    public function definition(): array
    {
        $category = ['2','1','4','5','7'];
        $topic = substr($this->faker->sentence(rand(3, 5)), 0, 45);
        $description = $this->faker->sentence(rand(10, 25));
    	return [
            'topic'         => $topic,
            'slug'          => Str::slug($topic),
            'description'   => $description,
            'images'        => 'avatar.jpg',
            'category_id'   => $category[rand(0, 3)]
    	];
    }
}

