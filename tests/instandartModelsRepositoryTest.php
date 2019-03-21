<?php

use App\Models\instandartModels;
use App\Repositories\instandartModelsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class instandartModelsRepositoryTest extends TestCase
{
    use MakeinstandartModelsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var instandartModelsRepository
     */
    protected $instandartModelsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->instandartModelsRepo = App::make(instandartModelsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateinstandartModels()
    {
        $instandartModels = $this->fakeinstandartModelsData();
        $createdinstandartModels = $this->instandartModelsRepo->create($instandartModels);
        $createdinstandartModels = $createdinstandartModels->toArray();
        $this->assertArrayHasKey('id', $createdinstandartModels);
        $this->assertNotNull($createdinstandartModels['id'], 'Created instandartModels must have id specified');
        $this->assertNotNull(instandartModels::find($createdinstandartModels['id']), 'instandartModels with given id must be in DB');
        $this->assertModelData($instandartModels, $createdinstandartModels);
    }

    /**
     * @test read
     */
    public function testReadinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $dbinstandartModels = $this->instandartModelsRepo->find($instandartModels->id);
        $dbinstandartModels = $dbinstandartModels->toArray();
        $this->assertModelData($instandartModels->toArray(), $dbinstandartModels);
    }

    /**
     * @test update
     */
    public function testUpdateinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $fakeinstandartModels = $this->fakeinstandartModelsData();
        $updatedinstandartModels = $this->instandartModelsRepo->update($fakeinstandartModels, $instandartModels->id);
        $this->assertModelData($fakeinstandartModels, $updatedinstandartModels->toArray());
        $dbinstandartModels = $this->instandartModelsRepo->find($instandartModels->id);
        $this->assertModelData($fakeinstandartModels, $dbinstandartModels->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteinstandartModels()
    {
        $instandartModels = $this->makeinstandartModels();
        $resp = $this->instandartModelsRepo->delete($instandartModels->id);
        $this->assertTrue($resp);
        $this->assertNull(instandartModels::find($instandartModels->id), 'instandartModels should not exist in DB');
    }
}
