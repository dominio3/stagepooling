<?php

namespace App\Http\Controllers;

use App\DataTables\StageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Repositories\StageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StageController extends AppBaseController
{
    /** @var  StageRepository */
    private $stageRepository;

    public function __construct(StageRepository $stageRepo)
    {
        $this->stageRepository = $stageRepo;
    }

    /**
     * Display a listing of the Stage.
     *
     * @param StageDataTable $stageDataTable
     * @return Response
     */
    public function index(StageDataTable $stageDataTable)
    {
        return $stageDataTable->render('stages.index');
    }

    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create()
    {
        $states = ([ 'Habilitado' => 'Habilitado' , 'Inhabilitado' =>'Inhabilitado' ]);
        return view('stages.create')->with(compact('states'));
    }

    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $input = $request->all();

        $stage = $this->stageRepository->create($input);

        Flash::success('Stage saved successfully.');

        return redirect(route('stages.index'));
    }

    /**
     * Display the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = ([ 'Habilitado' => 'Habilitado' , 'Inhabilitado' =>'Inhabilitado' ]);
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('stages.show')->with('stage', $stage)->with(compact('states'));
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $states = ([ 'Habilitado' => 'Habilitado' , 'Inhabilitado' =>'Inhabilitado' ]);
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('stages.edit')->with('stage', $stage)->with(compact('states'));
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param  int              $id
     * @param UpdateStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        $stage = $this->stageRepository->update($request->all(), $id);

        Flash::success('Stage updated successfully.');

        return redirect(route('stages.index'));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        $this->stageRepository->delete($id);

        Flash::success('Stage deleted successfully.');

        return redirect(route('stages.index'));
    }
}
