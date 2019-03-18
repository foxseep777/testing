<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestModelsAPIRequest;
use App\Http\Requests\API\UpdateTestModelsAPIRequest;
use App\Models\TestModels;
use App\Repositories\TestModelsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TestModelsController
 * @package App\Http\Controllers\API
 */

class TestModelsAPIController extends AppBaseController
{
    /** @var  TestModelsRepository */
    private $testModelsRepository;

    public function __construct(TestModelsRepository $testModelsRepo)
    {
        $this->testModelsRepository = $testModelsRepo;
    }

    /**
     * Display a listing of the TestModels.
     * GET|HEAD /testModels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->testModelsRepository->pushCriteria(new RequestCriteria($request));
        $this->testModelsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $testModels = $this->testModelsRepository->all();

        return $this->sendResponse($testModels->toArray(), 'Test Models retrieved successfully');
    }

    /**
     * Store a newly created TestModels in storage.
     * POST /testModels
     *
     * @param CreateTestModelsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTestModelsAPIRequest $request)
    {
        $input = $request->all();

        $testModels = $this->testModelsRepository->create($input);

        return $this->sendResponse($testModels->toArray(), 'Test Models saved successfully');
    }

    /**
     * Display the specified TestModels.
     * GET|HEAD /testModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TestModels $testModels */
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            return $this->sendError('Test Models not found');
        }

        return $this->sendResponse($testModels->toArray(), 'Test Models retrieved successfully');
    }

    /**
     * Update the specified TestModels in storage.
     * PUT/PATCH /testModels/{id}
     *
     * @param  int $id
     * @param UpdateTestModelsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestModelsAPIRequest $request)
    {
        $input = $request->all();

        /** @var TestModels $testModels */
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            return $this->sendError('Test Models not found');
        }

        $testModels = $this->testModelsRepository->update($input, $id);

        return $this->sendResponse($testModels->toArray(), 'TestModels updated successfully');
    }

    /**
     * Remove the specified TestModels from storage.
     * DELETE /testModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TestModels $testModels */
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            return $this->sendError('Test Models not found');
        }

        $testModels->delete();

        return $this->sendResponse($id, 'Test Models deleted successfully');
    }
}
