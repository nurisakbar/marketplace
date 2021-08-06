<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Entities\Forum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ForumTest extends TestCase
{
    protected $endPointForum = "forum";

    public function TestGetAllForum()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endPointForum);
        $response->seeStatusCode(200);
    }

    public function testCreateForum()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $data =[
            'topic'             =>    'Forum Test',
            'description'       =>    'Description Test',
            'category_id'       =>    '2',
            'images'            =>    $file
        ];
        $response = $this->actingAs($this->getUser(), 'api')->post($this->endPointForum, $data);
        $response->seeStatusCode(201);
    }

    public function testUpdateForum()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $forum = Forum::factory()->create();
        $data =[
            'topic'             =>    'Topic Test',
            'description'       =>    'Test Description',
            'category_id'       =>    '1',
            'images'            =>    $file
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endPointForum.'/'.$forum->id,$data);
        $response->seeStatusCode(202);
    }

    public function tetsDeleteForum()
    {
        $forum   = Forum::factory()->create();
        $response   = $this->actingAs($this->getUser(), 'api')->delete($this->endPointForum.'/'.$forum->id);
        $response->seeStatusCode(200);
    }
}
