<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinstandartModelAPIRequest;
use App\Http\Requests\API\UpdateinstandartModelAPIRequest;
use App\Models\instandartModel;
use App\Repositories\instandartModelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class instandartModelController
 * @package App\Http\Controllers\API
 */

class instandartModelAPIController extends AppBaseController
{
    /** @var  instandartModelRepository */
    private $instandartModelRepository;

    public function __construct(instandartModelRepository $instandartModelRepo)
    {
        $this->instandartModelRepository = $instandartModelRepo;
    }

    /**
     * Display a listing of the instandartModel.
     * GET|HEAD /instandartModels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->instandartModelRepository->pushCriteria(new RequestCriteria($request));
        $this->instandartModelRepository->pushCriteria(new LimitOffsetCriteria($request));
        $instandartModels = $this->instandartModelRepository->all();

        return $this->sendResponse($instandartModels->toArray(), 'Instandart Models retrieved successfully');
    }

    /**
     * Store a newly created instandartModel in storage.
     * POST /instandartModels
     *
     * @param CreateinstandartModelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinstandartModelAPIRequest $request)
    {
        $input = $request->all();

        $instandartModels = $this->instandartModelRepository->create($input);

        return $this->sendResponse($instandartModels->toArray(), 'Instandart Model saved successfully');
    }

    /**
     * Display the specified instandartModel.
     * GET|HEAD /instandartModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var instandartModel $instandartModel */
        $instandartModel = $this->instandartModelRepository->findWithoutFail($id);

        if (empty($instandartModel)) {
            return $this->sendError('Instandart Model not found');
        }

        return $this->sendResponse($instandartModel->toArray(), 'Instandart Model retrieved successfully');
    }

    /**
     * Update the specified instandartModel in storage.
     * PUT/PATCH /instandartModels/{id}
     *
     * @param  int $id
     * @param UpdateinstandartModelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstandartModelAPIRequest $request)
    {
        $input = $request->all();

        /** @var instandartModel $instandartModel */
        $instandartModel = $this->instandartModelRepository->findWithoutFail($id);

        if (empty($instandartModel)) {
            return $this->sendError('Instandart Model not found');
        }

        $instandartModel = $this->instandartModelRepository->update($input, $id);

        return $this->sendResponse($instandartModel->toArray(), 'instandartModel updated successfully');
    }

    /**
     * Remove the specified instandartModel from storage.
     * DELETE /instandartModels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var instandartModel $instandartModel */
        $instandartModel = $this->instandartModelRepository->findWithoutFail($id);

        if (empty($instandartModel)) {
            return $this->sendError('Instandart Model not found');
        }

        $instandartModel->delete();

        return $this->sendResponse($id, 'Instandart Model deleted successfully');
    }
}
