<?php
use App\Entities\Video;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VideoStoreTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    private function callApi($token, $body = [])
    {
        $baseUrl = config('app.url') . '/video?token=' . $token;
        return $this->post($baseUrl, $body);
    }

    public function testCreateVideo()
    {
        $token = $this->getToken();
        $file = UploadedFile::fake()->create('file.mp4',1024);

        $response = $this->callApi($token, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => '1',
            'file_name' => $file,
            'active' => 'y'
        ]);

       $response->seeStatusCode(201);
    }

}
