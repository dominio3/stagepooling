<?php

namespace App\Http\Controllers;

use App\DataTables\VehiculeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Repositories\VehiculeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VehiculeController extends AppBaseController
{
    /** @var  VehiculeRepository */
    private $vehiculeRepository;

    public function __construct(VehiculeRepository $vehiculeRepo)
    {
        $this->vehiculeRepository = $vehiculeRepo;
    }

    /**
     * Display a listing of the Vehicule.
     *
     * @param VehiculeDataTable $vehiculeDataTable
     * @return Response
     */
    public function index(VehiculeDataTable $vehiculeDataTable)
    {
        return $vehiculeDataTable->render('vehicules.index');
    }

    /**
     * Show the form for creating a new Vehicule.
     *
     * @return Response
     */
    public function create()
    {
        $states = ([ 'En Reserva' => 'En Reserva' , 'Estacionado' => 'Estacionado' , 'Sin Reserva' =>'Sin Reserva' ]);
        return view('vehicules.create')->with(compact('states'));
    }

    /**
     * Store a newly created Vehicule in storage.
     *
     * @param CreateVehiculeRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiculeRequest $request)
    {
        $input = $request->all();

        $vehicule = $this->vehiculeRepository->create($input);

        Flash::success('Vehicule saved successfully.');

        return redirect(route('vehicules.index'));
    }

    /**
     * Display the specified Vehicule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = ([ 'En Reserva' => 'En Reserva' , 'Estacionado' => 'Estacionado' , 'Sin Reserva' =>'Sin Reserva' ]);
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            Flash::error('Vehicule not found');

            return redirect(route('vehicules.index'));
        }

        return view('vehicules.show')->with('vehicule', $vehicule)->with(compact('states'));
    }

    /**
     * Show the form for editing the specified Vehicule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $states = ([ 'En Reserva' => 'En Reserva' , 'Estacionado' => 'Estacionado' , 'Sin Reserva' =>'Sin Reserva' ]);
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            Flash::error('Vehicule not found');

            return redirect(route('vehicules.index'));
        }

        return view('vehicules.edit')->with('vehicule', $vehicule)->with(compact('states'));
    }

    /**
     * Update the specified Vehicule in storage.
     *
     * @param  int              $id
     * @param UpdateVehiculeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiculeRequest $request)
    {
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            Flash::error('Vehicule not found');

            return redirect(route('vehicules.index'));
        }

        $vehicule = $this->vehiculeRepository->update($request->all(), $id);

        Flash::success('Vehicule updated successfully.');

        return redirect(route('vehicules.index'));
    }

    /**
     * Remove the specified Vehicule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            Flash::error('Vehicule not found');

            return redirect(route('vehicules.index'));
        }

        $this->vehiculeRepository->delete($id);

        Flash::success('Vehicule deleted successfully.');

        return redirect(route('vehicules.index'));
    }
}
