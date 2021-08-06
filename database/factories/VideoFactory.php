<?php

namespace Database\Factories;

use App\Entities\User;
use App\Entities\Video;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        $categoryId  = ['1', '2', '3', '4'];
        $active      = ['y', 'n'];
        $user        = User::inRandomOrder()->first();
        $title       = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
        $description = $this->faker->sentence(rand(10, 25));

    	return [
            'title'         =>  $title,
            'slug'          =>  Str::slug($title),
            'description'   =>  $description,
            'file_name'         =>  'video.mp4',
            'category_id'   =>  $categoryId[rand(0, 3)],
            'active'        =>  $active[rand(0, 1)],
            'user_id'       =>  $user->id,
    	];
    }
}
