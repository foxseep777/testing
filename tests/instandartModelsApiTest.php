<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class instandartModelsApiTest extends TestCase
{
    use MakeinstandartModelsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateinstandartModels()
    {
        $instandartModels = $this->fakeinstandartModelsData();
        $this->json('POST', '/api/v1/instandartModels', $instandartModels);

        $this->assertApiResponse($instandartModels);
    }

    /**
     * @test
     */
    public function testReadinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $this->json('GET', '/api/v1/instandartModels/'.$instandartModels->id);

        $this->assertApiResponse($instandartModels->toArray());
    }

    /**
     * @test
     */
    public function testUpdateinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $editedinstandartModels = $this->fakeinstandartModelsData();

        $this->json('PUT', '/api/v1/instandartModels/'.$instandartModels->id, $editedinstandartModels);

        $this->assertApiResponse($editedinstandartModels);
    }

    /**
     * @test
     */
    public function testDeleteinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $this->json('DELETE', '/api/v1/instandartModels/'.$instandartModels->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/instandartModels/'.$instandartModels->id);

        $this->assertResponseStatus(404);
    }
}
