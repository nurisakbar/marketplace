<?php
use App\Entities\Video;
use App\Entities\Category;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;

class VideoUpdateTest extends TestCase
{
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    private function callApi($token, $id, $body = [])
    {
        $baseUrl = config('app.url') . '/video/' . $id . '?token=' . $token;
        return $this->put($baseUrl, $body);
    }

    public function testUpdateVideo()
    {
        $token = $this->getToken();
        $video = Video::first();
        $category = Category::first();
        $file = UploadedFile::fake()->create('file.mp4',1024);

        $response = $this->callApi($token, $video->id, [
            'title' => 'Testing title edit',
            'description' => 'Testing description edit',
            'category_id' => $category->id,
            'file_name' =>$file,
            'active' => 'y'
        ]);

       $response->seeStatusCode(200);
    }

}
