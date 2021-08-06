<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class VideoIndexTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }
    private function callApi($token)
    {
        $baseUrl = config('app.url') . '/video?token=' . $token;
        return $this->get($baseUrl);
    }
    public function testIndexVideo()
    {
        $token = $this->getToken();
        $response = $this->callApi($token);
        $response->seeStatusCode(200);
    }


}
