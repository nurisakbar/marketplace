<?php

use App\Entities\Transaction;
use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    protected $driver = 'api';
    protected $endPoint = 'transactions';
    protected $resourceStructure = [
        'id',
        'user',
        'store',
        'courier_service',
        'user_address',
        'status',
        'note'
    ];

    protected function generateFakeData()
    {
        return Transaction::factory()->make()->toArray();
    }

    protected function getRandomId()
    {
        return Transaction::get('id')->random()->id;
    }

    protected function getUser()
    {
        return User::factory()->create();
    }

    protected function logAsUser()
    {
        return $this->actingAs($this->getUser(), $this->driver);
    }

    public function testCreateTransaction()
    {
        $data = $this->generateFakeData();

        $response = $this->logAsUser()->post($this->endPoint, $data);
        $response->seeStatusCode(201)
            ->seeJsonStructure([
                'data' => $this->resourceStructure
            ]);
    }

    public function testUpdateTransaction()
    {
        $data = $this->generateFakeData();
        $randomId = $this->getRandomId();

        $response = $this->logAsUser()->put("$this->endPoint/$randomId", $data);
        $response->seeStatusCode(200)
            ->seeJsonStructure([
                'data' => $this->resourceStructure
            ]);
    }

    public function testGetTransactions()
    {
        $response = $this->logAsUser()->get($this->endPoint);
        $response->seeStatusCode(200)
            ->seeJsonStructure([
                'data' => [
                    '*' => $this->resourceStructure
                ]
            ]);
    }

    public function testGetTransaction()
    {
        $randomId = $this->getRandomId();

        $response = $this->logAsUser()->get("$this->endPoint/$randomId");
        $response->seeStatusCode(200)
            ->seeJsonStructure([
                'data' => $this->resourceStructure
            ]);
    }

    public function testDeleteTransaction()
    {
        $randomId = $this->getRandomId();

        $response = $this->logAsUser()->delete("$this->endPoint/$randomId");
        $response->seeStatusCode(200);
    }
}
