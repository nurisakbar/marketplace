<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Entities\Category;
use App\Entities\Article;
use Illuminate\Http\UploadedFile;


class ArticleTest extends TestCase
{
    protected $endpointArticle ="article";

    public function testGetAllArticle()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endpointArticle);
        $response->seeStatusCode(200);
    }

    public function testCreateArticle()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $data =[
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => '1',
            'image' =>$file,
        ];
        $response = $this->actingAs($this->getUser(), 'api')->post($this->endpointArticle, $data);
        $response->seeStatusCode(201);
    }

    public function testUpdateArticle()
    {
        $category   = Category::factory()->create();
        $article    = Article::factory()->create();
        $file       = UploadedFile::fake()->image('avatar.jpg');

        $data =[
            'title'         => 'Article Update Test',
            'description'   => 'Testing Update description',
            'category_id'   => $category->id,
            'image'         =>$file,
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endpointArticle.'/'.$article->id, $data);
        $response->seeStatusCode(200);
    }

    public function testDeleteArticle()
    {
        $article   = Article::factory()->create();
        $response   = $this->actingAs($this->getUser(), 'api')->delete($this->endpointArticle.'/'.$article->id);
        $response->seeStatusCode(200);
    }

    
}
