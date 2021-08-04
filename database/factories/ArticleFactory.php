<?php

namespace Database\Factories;

use App\Entities\User;
use App\Entities\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

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
            'image'         =>  'gambar.jpg',
            'category_id'   =>  $categoryId[rand(0, 3)],
            'active'        =>  $active[rand(0, 1)],
            'user_id'       =>  $user->id,
        ];
    }
}
