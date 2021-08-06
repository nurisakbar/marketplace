<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Entities\Category;
use App\Entities\Video;
use Illuminate\Http\UploadedFile;

class VideoTest extends TestCase
{
    protected $endpointVideo ="video";

    public function testGetAllVideo()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endpointVideo);
        $response->seeStatusCode(200);
    }
    public function testCreateVideo()
    {
        $category   = Category::factory()->create();

        $file = UploadedFile::fake()->create('file.mp4',1024);
        $data = [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => $category->id,
            'file_name' => $file,
            'active' => 'y'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->post($this->endpointVideo, $data);
        $response->seeStatusCode(201);
    }
    public function testUpdateVideo()
    {
        $category   = Category::factory()->create();
        $video    = Video::factory()->create();
        $file = UploadedFile::fake()->create('file.mp4',1024);

        $data = [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => $category->id,
            'file_name' => $file,
            'active' => 'y'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endpointVideo . '/' . $video->id, $data);
        $response->seeStatusCode(200);
    }
    public function testDeleteVideo()
    {
        $video    = Video::factory()->create();
        $response   = $this->actingAs($this->getUser(), 'api')->delete($this->endpointVideo . '/' . $video->id);
        $response->seeStatusCode(200);
    }

}
