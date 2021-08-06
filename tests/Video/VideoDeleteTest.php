<?php

use App\Entities\Video;
use App\Entities\Category;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class VideoDeleteTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }


    private function callApi($token, $id)
    {
        $baseUrl = config('app.url') . '/video/' . $id . '?token=' . $token;
        return $this->delete($baseUrl);
    }

    public function testDeleteVideo()
    {
        $token = $this->getToken();
        $video = Video::first();
        $response = $this->callApi($token, $video->id);
        $response->seeStatusCode(200);
    }

}
