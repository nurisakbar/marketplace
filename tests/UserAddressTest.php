<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Entities\UserAddress;

class UserAddressTest extends TestCase
{
    protected $endpointUserAddress = "user_address";

    public function testGetAllUserAddress()
    {
        $response   = $this->actingAs($this->getUser(), 'api')->get($this->endpointUserAddress);
        $response->seeStatusCode(200);
    }

    public function testCreateUserAddress()
    {
        $data = [
            'lebel'      => 'test lebel',
            'address'    => 'test address',
            'phone'      => '081621600',
            'name'       => 'test name',
            'village_id' => '1101012001',
            'default'    => 'y'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->post($this->endpointUserAddress, $data);
        $response->seeStatusCode(201);
    }

    public function testUpdateUserAddress()
    {
        $userAddress = UserAddress::factory()->create();
        $data = [
            'lebel'      => 'test lebel update',
            'address'    => 'test address update',
            'phone'      => '081621600',
            'name'       => 'test name update',
            'village_id' => '1101022006',
            'default'    => 'n'
        ];
        $response = $this->actingAs($this->getUser(), 'api')->put($this->endpointUserAddress . '/' . $userAddress->id, $data);
        $response->seeStatusCode(200);
    }


    public function testDeleteUserAddress()
    {
        $userAddress = UserAddress::factory()->create();
        $response    = $this->actingAs($this->getUser(), 'api')->delete($this->endpointUserAddress . '/' . $userAddress->id);
        $response->seeStatusCode(200);
    }
}
