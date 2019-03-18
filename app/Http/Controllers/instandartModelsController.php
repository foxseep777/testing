<?php

namespace App\Http\Controllers;

use App\DataTables\instandartModelsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateinstandartModelsRequest;
use App\Http\Requests\UpdateinstandartModelsRequest;
use App\Repositories\instandartModelsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class instandartModelsController extends AppBaseController
{
    /** @var  instandartModelsRepository */
    private $instandartModelsRepository;

    public function __construct(instandartModelsRepository $instandartModelsRepo)
    {
        $this->instandartModelsRepository = $instandartModelsRepo;
    }

    /**
     * Display a listing of the instandartModels.
     *
     * @param instandartModelsDataTable $instandartModelsDataTable
     * @return Response
     */
    public function index(instandartModelsDataTable $instandartModelsDataTable)
    {
        return $instandartModelsDataTable->render('instandart_models.index');
    }

    /**
     * Show the form for creating a new instandartModels.
     *
     * @return Response
     */
    public function create()
	
    {
        return view('instandart_models.create');
    }

    /**
     * Store a newly created instandartModels in storage.
     *
     * @param CreateinstandartModelsRequest $request
     *
     * @return Response
     */
    public function store(CreateinstandartModelsRequest $request)

    {
        $input = $request->all();

        $instandartModels = $this->instandartModelsRepository->create($input);

        Flash::success('Instandart Models saved successfully.');

        return redirect(route('instandartModels.index'));
    }

    /**
     * Display the specified instandartModels.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            Flash::error('Instandart Models not found');

            return redirect(route('instandartModels.index'));
        }

        return view('instandart_models.show')->with('instandartModels', $instandartModels);
    }

    /**
     * Show the form for editing the specified instandartModels.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            Flash::error('Instandart Models not found');

            return redirect(route('instandartModels.index'));
        }

        return view('instandart_models.edit')->with('instandartModels', $instandartModels);
    }

    /**
     * Update the specified instandartModels in storage.
     *
     * @param  int              $id
     * @param UpdateinstandartModelsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstandartModelsRequest $request)
    {
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            Flash::error('Instandart Models not found');

            return redirect(route('instandartModels.index'));
        }

        $instandartModels = $this->instandartModelsRepository->update($request->all(), $id);

        Flash::success('Instandart Models updated successfully.');

        return redirect(route('instandartModels.index'));
    }

    /**
     * Remove the specified instandartModels from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instandartModels = $this->instandartModelsRepository->findWithoutFail($id);

        if (empty($instandartModels)) {
            Flash::error('Instandart Models not found');

            return redirect(route('instandartModels.index'));
        }

        $this->instandartModelsRepository->delete($id);

        Flash::success('Instandart Models deleted successfully.');

        return redirect(route('instandartModels.index'));
    }
}
