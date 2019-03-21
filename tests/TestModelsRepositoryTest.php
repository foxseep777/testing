<?php

use App\Models\TestModels;
use App\Repositories\TestModelsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestModelsRepositoryTest extends TestCase
{
    use MakeTestModelsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TestModelsRepository
     */
    protected $testModelsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->testModelsRepo = App::make(TestModelsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTestModels()
    {
        $testModels = $this->fakeTestModelsData();
        $createdTestModels = $this->testModelsRepo->create($testModels);
        $createdTestModels = $createdTestModels->toArray();
        $this->assertArrayHasKey('id', $createdTestModels);
        $this->assertNotNull($createdTestModels['id'], 'Created TestModels must have id specified');
        $this->assertNotNull(TestModels::find($createdTestModels['id']), 'TestModels with given id must be in DB');
        $this->assertModelData($testModels, $createdTestModels);
    }

    /**
     * @test read
     */
    public function testReadTestModels()
    {
        $testModels = $this->makeTestModels();
        $dbTestModels = $this->testModelsRepo->find($testModels->id);
        $dbTestModels = $dbTestModels->toArray();
        $this->assertModelData($testModels->toArray(), $dbTestModels);
    }

    /**
     * @test update
     */
    public function testUpdateTestModels()
    {
        $testModels = $this->makeTestModels();
        $fakeTestModels = $this->fakeTestModelsData();
        $updatedTestModels = $this->testModelsRepo->update($fakeTestModels, $testModels->id);
        $this->assertModelData($fakeTestModels, $updatedTestModels->toArray());
        $dbTestModels = $this->testModelsRepo->find($testModels->id);
        $this->assertModelData($fakeTestModels, $dbTestModels->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTestModels()
    {
        $testModels = $this->makeTestModels();
        $resp = $this->testModelsRepo->delete($testModels->id);
        $this->assertTrue($resp);
        $this->assertNull(TestModels::find($testModels->id), 'TestModels should not exist in DB');
    }
}
