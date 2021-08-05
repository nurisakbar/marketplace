<?php

use App\Entities\Article;
use App\Entities\Category;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;


class updateTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    private function callApi($token, $id, $body = [])
    {
        $baseUrl = config('app.url') . '/article/' . $id . '?token=' . $token;
        return $this->put($baseUrl, $body);
    }

    public function testUpdateArticle()
    {
        $token = $this->getToken();
        $article = Article::first();
        $file = UploadedFile::fake()->image('avatar.jpg');
        $category = Category::first();

        $response = $this->callApi($token, $article->id, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => $category->id,
            'image' =>$file,
        ]);
        $response->seeStatusCode(200);
    }
}
