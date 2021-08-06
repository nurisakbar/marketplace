<?php

use App\Entities\Category;
use App\Entities\Harvest;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class HarvestTest extends TestCase
{
    protected $endpointHarvest = "harvest";

    public function testGetAllHarvest()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endpointHarvest);
        $response->seeStatusCode(200);
    }

    public function testCreateHarvest()
    {
        $category   = Category::factory()->create();
        $data = [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => $category->id,
        ];

        $response = $this->actingAs($this->getUser(), 'api')->post($this->endpointHarvest, $data);
        $response->seeStatusCode(201);
    }

    public function testUpdateHarvest()
    {
        $category   = Category::factory()->create();
        $harvest    = Harvest::factory()->create();

        $data = [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => $category->id,
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endpointHarvest . '/' . $harvest->id, $data);
        $response->seeStatusCode(200);
    }

    public function testDeleteHarvest()
    {
        $harvest    = Harvest::factory()->create();
        $response   = $this->actingAs($this->getUser(), 'api')->delete($this->endpointHarvest . '/' . $harvest->id);
        $response->seeStatusCode(200);
    }
}
