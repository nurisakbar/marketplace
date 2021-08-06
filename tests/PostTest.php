<?php
namespace tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\TestCase;
use App\Models\User;
use App\Models\Store;

class PostTest extends TestCase
{
  public function create_store(){
    $user = factory(User::class)->create();
    $data = [
        'user_id'=> $user->id,
        'name'=> $this->faker->sentence,
        'description'=> $this->faker->paragraph,
        'logo'=> $this->faker->paragraph,
        'address'=> $this->faker->paragraph,
        'phone'=> $this->faker->sentence,

    ];
    $this->post(route('stores'), $data)
        ->assertStatus(201)
        ->assertJson($data);
  }

  public function update_store(){
    $store = factory(Store::class)->create();
    $user = factory(User::class)->create();
    $data = [
        'user_id'=> $user->id,
        'name'=> $this->faker->sentence,
        'description'=> $this->faker->paragraph,
        'logo'=> $this->faker->paragraph,
        'address'=> $this->faker->paragraph,
        'phone'=> $this->faker->sentence,
    ];
    $this->put(route('post/'.$store->id), $data)
        ->assertStatus(200)
        ->assertJson($data);
  }

  public function show_store(){
    $post = factory(Store::class)->create();
    $this->get(route('stores/'.$post->id))
        ->assertStatus(200);
  }


  public function delete_store(){
    $post = factory(Store::class)->create();
    $this->delete(route('stores/'.$post->id))
        ->assertStatus(204);
  }

  public function list_store(){
    $posts = factory(Store::class, 2)->create()->map(function ($post) {
        return $post->only(['id', 'name', 'description']);
    });
    $this->get(route('stores'))
        ->assertStatus(200)
        ->assertJson($posts->toArray())
        ->assertJsonStructure([
            '*' => [ 'id', 'name', 'description' ],
        ]);
  }
}