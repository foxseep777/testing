<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinstandartModelsAPIRequest;
use App\Http\Requests\API\UpdateinstandartModelsAPIRequest;
use App\Models\instandartModels;
use App\Repositories\instandartModelsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class instandartModelsController
 * @package App\Http\Controllers\API
 */

class instandartModelsAPIController extends AppBaseController
{
    /** @var  instandartModelsRepository */
    private $instandartModelsRepository;

    public function __construct(instandartModelsRepository $instandartModelsRepo)
    {
        $this->instandartModelsRepository = $instandartModelsRepo;
    }

    /**
     * Display a listing of the instandartModels.
     * GET|HEAD /instandartModels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->instandartModelsRepository->pushCriteria(new RequestCriteria($request));
        $this->instandartModelsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $instandartModels = $this->instandartModelsRepository->all();

        return $this->sendResponse($instandartModels->toArray(), 'Instandart Models retrieved successfully');
    }

    /**
     * Store a newly created instandartModels in storage.
     * POST /instandartModels
     *
     * @param CreateinstandartModelsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinstandartModelsAPIRequest $request)
    {
        $input = $request->all();

        $instandartModels = $this->instandartModelsRepository->create($input);

        return $this->sendResponse($instandartModels->toArray(), 'Instandart Models saved successfully');
    }

    /**
     * Display the specified instandartModels.
     * GET|HEAD /instandartModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var instandartModels $instandartModels */
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            return $this->sendError('Instandart Models not found');
        }

        return $this->sendResponse($instandartModels->toArray(), 'Instandart Models retrieved successfully');
    }

    /**
     * Update the specified instandartModels in storage.
     * PUT/PATCH /instandartModels/{id}
     *
     * @param  int $id
     * @param UpdateinstandartModelsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstandartModelsAPIRequest $request)
    {
        $input = $request->all();

        /** @var instandartModels $instandartModels */
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            return $this->sendError('Instandart Models not found');
        }

        $instandartModels = $this->instandartModelsRepository->update($input, $id);

        return $this->sendResponse($instandartModels->toArray(), 'instandartModels updated successfully');
    }

    /**
     * Remove the specified instandartModels from storage.
     * DELETE /instandartModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var instandartModels $instandartModels */
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            return $this->sendError('Instandart Models not found');
        }

        $instandartModels->delete();

        return $this->sendResponse($id, 'Instandart Models deleted successfully');
    }
}
