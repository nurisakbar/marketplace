<?php

use App\Entities\Category;
use App\Entities\Harvest;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateTest extends TestCase
{
    /**
     * Get token JWT.
     *
     * @return token
     */
    private function getToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    /**
     * Call api.
     *
     * @return response
     */
    private function callApi($token, $id, $body = [])
    {
        $baseUrl = config('app.url') . '/harvest/' . $id . '?token=' . $token;
        return $this->put($baseUrl, $body);
    }

    /**
     * User can update harvest after logged in.
     *
     * @return void
     */
    public function testUpdateHarvestReturnOk()
    {
        $token = $this->getToken();
        $harvest = Harvest::first();
        $response = $this->callApi($token, $harvest->id, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => Category::first()->id,
        ]);
        $response->seeStatusCode(200);
    }

    /**
     * User can not update harvest without params.
     *
     * @return void
     */
    public function testCannotUpdateHarvestWithoutParams()
    {
        $token = $this->getToken();
        $harvest = Harvest::first();
        $response = $this->callApi($token, $harvest->id);
        $response->seeStatusCode(422);
    }

    /**
     * User can not update harvest if not logged in.
     *
     * @return void
     */
    public function testUpdateHarvestShouldBeLoggedIn()
    {
        $harvest = Harvest::first();
        $response = $this->callApi('', $harvest->id);
        $response->seeStatusCode(401);
    }

    /**
     * User can not update harvest if not logged in.
     *
     * @return void
     */
    public function testCannotUpdateDoesntExistHarvest()
    {
        $token = $this->getToken();
        $response = $this->callApi($token, 0, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => Category::first()->id,
        ]);
        $response->seeStatusCode(404);
    }
}
