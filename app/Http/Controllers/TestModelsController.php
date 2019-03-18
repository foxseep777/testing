<?php

namespace App\Http\Controllers;

use App\DataTables\TestModelsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTestModelsRequest;
use App\Http\Requests\UpdateTestModelsRequest;
use App\Repositories\TestModelsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TestModelsController extends AppBaseController
{
    /** @var  TestModelsRepository */
    private $testModelsRepository;

    public function __construct(TestModelsRepository $testModelsRepo)
    {
        $this->testModelsRepository = $testModelsRepo;
    }

    /**
     * Display a listing of the TestModels.
     *
     * @param TestModelsDataTable $testModelsDataTable
     * @return Response
     */
    public function index(TestModelsDataTable $testModelsDataTable)
    {
        return $testModelsDataTable->render('test_models.index');
    }

    /**
     * Show the form for creating a new TestModels.
     *
     * @return Response
     */
    public function create()
    {
        return view('test_models.create');
    }

    /**
     * Store a newly created TestModels in storage.
     *
     * @param CreateTestModelsRequest $request
     *
     * @return Response
     */
    public function store(CreateTestModelsRequest $request)
    {
        $input = $request->all();

        $testModels = $this->testModelsRepository->create($input);

        Flash::success('Test Models saved successfully.');

        return redirect(route('testModels.index'));
    }

    /**
     * Display the specified TestModels.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            Flash::error('Test Models not found');

            return redirect(route('testModels.index'));
        }

        return view('test_models.show')->with('testModels', $testModels);
    }

    /**
     * Show the form for editing the specified TestModels.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            Flash::error('Test Models not found');

            return redirect(route('testModels.index'));
        }

        return view('test_models.edit')->with('testModels', $testModels);
    }

    /**
     * Update the specified TestModels in storage.
     *
     * @param  int              $id
     * @param UpdateTestModelsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestModelsRequest $request)
    {
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            Flash::error('Test Models not found');

            return redirect(route('testModels.index'));
        }

        $testModels = $this->testModelsRepository->update($request->all(), $id);

        Flash::success('Test Models updated successfully.');

        return redirect(route('testModels.index'));
    }

    /**
     * Remove the specified TestModels from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testModels = $this->testModelsRepository->findWithoutFail($id);

        if (empty($testModels)) {
            Flash::error('Test Models not found');

            return redirect(route('testModels.index'));
        }

        $this->testModelsRepository->delete($id);

        Flash::success('Test Models deleted successfully.');

        return redirect(route('testModels.index'));
    }
}
