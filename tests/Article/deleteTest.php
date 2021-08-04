<?php

use App\Entities\Article;
use App\Entities\Category;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class deleteTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

  
    private function callApi($token, $id)
    {
        $baseUrl = config('app.url') . '/article/' . $id . '?token=' . $token;
        return $this->delete($baseUrl);
    }

    public function testDeleteArticle()
    {
        $token = $this->getToken();
        $article = Article::first();
        $response = $this->callApi($token, $article->id);
        $response->seeStatusCode(200);
    }

}
