<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Entities\Category;

class CategoryTest extends TestCase
{
    protected $endpointCategory ="category";

    protected function getUser()
    {
        return User::factory()->create();
    }

    public function testGetAllCategory()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endpointCategory);
        $response->seeStatusCode(200);
    }


    public function testCreateCategory()
    {
        $data =[
            'name'            =>    'Category Test',
            'description'     =>    'Test Description',
            'type'            =>    'article'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->post($this->endpointCategory, $data);
        $response->seeStatusCode(201);
    }

    public function testUpdateCategory()
    {
        $category = Category::factory()->create();
        $data =[
            'name'            =>    'Category Update Test',
            'description'     =>    'Test Description Update',
            'type'            =>    'article'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endpointCategory.'/'.$category->id, $data);
        $response->seeStatusCode(202);
    }


    public function testDeleteCategory()
    {
        $category   = Category::factory()->create();
        $response   = $this->actingAs($this->getUser(), 'api')->delete($this->endpointCategory.'/'.$category->id);
        $response->seeStatusCode(200);
    }
}
