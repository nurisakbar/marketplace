<?php

use App\Entities\Harvest;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class DeleteTest extends TestCase
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
    private function callApi($token, $id)
    {
        $baseUrl = config('app.url') . '/harvest/' . $id . '?token=' . $token;
        return $this->delete($baseUrl);
    }

    /**
     * User can delete harvest after logged in.
     *
     * @return void
     */
    public function testDeleteHarvestReturnOk()
    {
        $token = $this->getToken();
        $harvest = Harvest::first();
        $response = $this->callApi($token, $harvest->id);
        $response->seeStatusCode(200);
    }

    /**
     * User can not delete harvest if not logged in.
     *
     * @return void
     */
    public function testDeleteHarvestShouldBeLoggedIn()
    {
        $harvest = Harvest::first();
        $response = $this->callApi('', $harvest->id);
        $response->seeStatusCode(401);
    }

    /**
     * User can not delete harvest if not logged in.
     *
     * @return void
     */
    public function testCannotDeleteDoesntExistHarvest()
    {
        $token = $this->getToken();
        $response = $this->callApi($token, 0);
        $response->seeStatusCode(404);
    }
}
