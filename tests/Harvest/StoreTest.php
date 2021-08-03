<?php

use App\Entities\Category;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class StoreTest extends TestCase
{
    /**
     * Get token JWT.
     *
     * @return token
     */
    private function testGetToken()
    {
        $user = User::first();
        return JWTAuth::fromUser($user);
    }

    /**
     * Call api.
     *
     * @return response
     */
    private function callApi($token, $body = [])
    {
        $baseUrl = config('app.url') . '/harvest?token=' . $token;
        return $this->post($baseUrl, $body);
    }

    /**
     * User can create harvest after logged in.
     *
     * @return void
     */
    public function testCallCreateHarvestReturnOk()
    {
        $token = $this->testGetToken();
        $response = $this->callApi($token, [
            'title' => 'Testing title',
            'description' => 'Testing description',
            'category_id' => Category::first()->id,
        ]);
        $response->seeStatusCode(201);
    }

    /**
     * User can not create harvest without params.
     *
     * @return void
     */
    public function testCannotCreateHarvestWithoutParams()
    {
        $token = $this->testGetToken();
        $response = $this->callApi($token);
        $response->seeStatusCode(422);
    }

    /**
     * User can not create harvest if not logged in.
     *
     * @return void
     */
    public function testCreateHarvestShouldBeLoggedIn()
    {
        $response = $this->callApi('');
        $response->seeStatusCode(401);
    }
}
