<?php

use App\Entities\Article;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class storeTest extends TestCase
{

    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    private function callApi($token, $body = [])
    { 
        $baseUrl = config('app.url') . '/article?token=' . $token;
        return $this->post($baseUrl, $body);
    }

    public function testCreateArticle()
    {
        $token = $this->getToken();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->callApi($token, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => '1',
            'image' =>$file,
    
        ]);

       $response->seeStatusCode(201);
    }
}