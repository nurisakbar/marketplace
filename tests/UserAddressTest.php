<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Entities\UserAddress;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\Village;

class UserAddressTest extends TestCase
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
    private function callApiBody($token, $body = [])
    {
        $baseUrl = config('app.url') . '/user_address?token=' . $token;
        return $this->post($baseUrl, $body);
    }

    private function callApi($token)
    {
        $baseUrl = config('app.url') . '/user_address?token=' . $token;
        return $this->get($baseUrl);
    }

    private function callApiUpdate($token, $id, $body = [])
    {
        $baseUrl = config('app.url') . '/user_address/' . $id . '?token=' . $token;
        return $this->put($baseUrl, $body);
    }
    private function callApiDelete($token, $id)
    {
        $baseUrl = config('app.url') . '/user_address/' . $id . '?token=' . $token;
        return $this->delete($baseUrl);
    }

    public function testIndexUserAddress()
    {
        $token = $this->getToken();
        $response = $this->callApi($token);
        $response->seeStatusCode(200);
    }

    public function testStoreUserAddress()
    {
        $token = $this->getToken();
        $response = $this->callApiBody($token, [
            'user_id'       => 1,
            'lebel'         => 'test lebel',
            'address'       => 'test address',
            'phone'         => '087347374343',
            'name'          => 'test name',
            'village_id'    => Village::first()->id,
            'default'       => 'y',
        ]);
        $response->seeStatusCode(201);
    }

    public function testUpdateUserAddress()
    {
        $token = $this->getToken();
        $userAddress = UserAddress::first();
        $response = $this->callApiUpdate($token, $userAddress->id, [
            'user_id'       => 1,
            'lebel'         => 'test lebel',
            'address'       => 'test address',
            'phone'         => '087347374343',
            'name'          => 'test name',
            'village_id'    => Village::first()->id,
            'default'       => 'y',
        ]);
        $response->seeStatusCode(200);
    }

    public function testDeleteUserAddress()
    {
        $token = $this->getToken();
        $harvest = UserAddress::first();
        $response = $this->callApiDelete($token, $harvest->id);
        $response->seeStatusCode(200);
    }
}
