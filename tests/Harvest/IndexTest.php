<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;

class IndexTest extends TestCase
{
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
    private function callApi($token)
    {
        $baseUrl = config('app.url') . '/harvest?token=' . $token;
        return $this->get($baseUrl);
    }

    /**
     * User can access index harvest after logged in.
     *
     * @return void
     */
    public function testCallIndexHarvestReturnOk()
    {
        $token = $this->getToken();
        $response = $this->callApi($token);
        $response->seeStatusCode(200);
    }

    /**
     * User can not access index harvest if not logged in.
     *
     * @return void
     */
    public function testCallIndexHarvestShouldBeLoggedIn()
    {
        $response = $this->callApi('');
        $response->seeStatusCode(401);
    }
}
