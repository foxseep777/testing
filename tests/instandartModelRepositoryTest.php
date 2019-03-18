<?php

use App\Models\instandartModel;
use App\Repositories\instandartModelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class instandartModelRepositoryTest extends TestCase
{
    use MakeinstandartModelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var instandartModelRepository
     */
    protected $instandartModelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->instandartModelRepo = App::make(instandartModelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateinstandartModel()
    {
        $instandartModel = $this->fakeinstandartModelData();
        $createdinstandartModel = $this->instandartModelRepo->create($instandartModel);
        $createdinstandartModel = $createdinstandartModel->toArray();
        $this->assertArrayHasKey('id', $createdinstandartModel);
        $this->assertNotNull($createdinstandartModel['id'], 'Created instandartModel must have id specified');
        $this->assertNotNull(instandartModel::find($createdinstandartModel['id']), 'instandartModel with given id must be in DB');
        $this->assertModelData($instandartModel, $createdinstandartModel);
    }

    /**
     * @test read
     */
    public function testReadinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $dbinstandartModel = $this->instandartModelRepo->find($instandartModel->id);
        $dbinstandartModel = $dbinstandartModel->toArray();
        $this->assertModelData($instandartModel->toArray(), $dbinstandartModel);
    }

    /**
     * @test update
     */
    public function testUpdateinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $fakeinstandartModel = $this->fakeinstandartModelData();
        $updatedinstandartModel = $this->instandartModelRepo->update($fakeinstandartModel, $instandartModel->id);
        $this->assertModelData($fakeinstandartModel, $updatedinstandartModel->toArray());
        $dbinstandartModel = $this->instandartModelRepo->find($instandartModel->id);
        $this->assertModelData($fakeinstandartModel, $dbinstandartModel->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteinstandartModel()
    {
        $instandartModel = $this->makeinstandartModel();
        $resp = $this->instandartModelRepo->delete($instandartModel->id);
        $this->assertTrue($resp);
        $this->assertNull(instandartModel::find($instandartModel->id), 'instandartModel should not exist in DB');
    }
}
