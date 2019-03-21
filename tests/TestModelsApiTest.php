<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestModelsApiTest extends TestCase
{
    use MakeTestModelsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTestModels()
    {
        $testModels = $this->fakeTestModelsData();
        $this->json('POST', '/api/v1/testModels', $testModels);

        $this->assertApiResponse($testModels);
    }

    /**
     * @test
     */
    public function testReadTestModels()
    {
        $testModels = $this->makeTestModels();
        $this->json('GET', '/api/v1/testModels/'.$testModels->id);

        $this->assertApiResponse($testModels->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTestModels()
    {
        $testModels = $this->makeTestModels();
        $editedTestModels = $this->fakeTestModelsData();

        $this->json('PUT', '/api/v1/testModels/'.$testModels->id, $editedTestModels);

        $this->assertApiResponse($editedTestModels);
    }

    /**
     * @test
     */
    public function testDeleteTestModels()
    {
        $testModels = $this->makeTestModels();
        $this->json('DELETE', '/api/v1/testModels/'.$testModels->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/testModels/'.$testModels->id);

        $this->assertResponseStatus(404);
    }
}
