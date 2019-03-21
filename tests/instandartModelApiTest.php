<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class instandartModelApiTest extends TestCase
{
    use MakeinstandartModelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateinstandartModel()
    {
        $instandartModel = $this->fakeinstandartModelData();
        $this->json('POST', '/api/v1/instandartModels', $instandartModel);

        $this->assertApiResponse($instandartModel);
    }

    /**
     * @test
     */
    public function testReadinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $this->json('GET', '/api/v1/instandartModels/'.$instandartModel->id);

        $this->assertApiResponse($instandartModel->toArray());
    }

    /**
     * @test
     */
    public function testUpdateinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $editedinstandartModel = $this->fakeinstandartModelData();

        $this->json('PUT', '/api/v1/instandartModels/'.$instandartModel->id, $editedinstandartModel);

        $this->assertApiResponse($editedinstandartModel);
    }

    /**
     * @test
     */
    public function testDeleteinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $this->json('DELETE', '/api/v1/instandartModels/'.$instandartModel->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/instandartModels/'.$instandartModel->id);

        $this->assertResponseStatus(404);
    }
}
