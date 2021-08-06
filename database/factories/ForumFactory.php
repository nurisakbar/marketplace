<?php

namespace Database\Factories;
use App\Entities\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Entities\User;

class ForumFactory extends Factory
{
    protected $model = Forum::class;

    public function definition(): array
    {
        $category = ['2','1','4','5','7'];
        $topic = substr($this->faker->sentence(rand(3, 5)), 0, 45);
        $description = $this->faker->sentence(rand(10, 25));
        $user        = User::inRandomOrder()->first();
    	return [
            'topic'         => $topic,
            'slug'          => Str::slug($topic),
            'user_id'       => $user->id,
            'description'   => $description,
            'images'        => 'avatar.jpg',
            'category_id'   => $category[rand(0, 3)]
    	];
    }
}

