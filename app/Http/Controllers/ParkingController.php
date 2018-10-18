<?php

namespace App\Http\Controllers;

use App\DataTables\ParkingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParkingRequest;
use App\Http\Requests\UpdateParkingRequest;
use App\Repositories\ParkingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Stage;
use App\Models\Parking;
use Illuminate\Support\Facades\Auth;

class ParkingController extends AppBaseController
{
    /** @var  ParkingRepository */
    private $parkingRepository;

    public function __construct(ParkingRepository $parkingRepo)
    {
        $this->parkingRepository = $parkingRepo;
    }

    /**
     * Display a listing of the Parking.
     *
     * @param ParkingDataTable $parkingDataTable
     * @return Response
     */
    public function index(ParkingDataTable $parkingDataTable)
    {
        return $parkingDataTable->render('parkings.index');
    }

    /**
     * Show the form for creating a new Parking.
     *
     * @return Response
     */
    public function create()
    {
        $states = ([ 'Disponible' => 'Disponible' , 'Ocupado' =>'Ocupado' ]);
        $stages = Stage::where('users_id','=',Auth::user()->id)->pluck('name' , 'id');
        $codigo = $this->generarCodigo();
        $parking = new Parking();

        return view('parkings.create')->with(compact('states' , 'stages' , 'codigo', 'parking'));
    }

    /**
     * Store a newly created Parking in storage.
     *
     * @param CreateParkingRequest $request
     *
     * @return Response
     */
    public function store(CreateParkingRequest $request)
    {
        $input = $request->all();

        $parking = $this->parkingRepository->create($input);

        Flash::success('Parking saved successfully.');

        return redirect(route('parkings.index'));
    }

    /**
     * Display the specified Parking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = ([ 'Disponible' => 'Disponible' , 'Ocupado' =>'Ocupado' ]);
        $stages = Stage::where('users_id','=',Auth::user()->id)->pluck('name' , 'id');
        $parking = $this->parkingRepository->findWithoutFail($id);
        $codigo = $parking->codigo;

        if (empty($parking)) {
            Flash::error('Parking not found');

            return redirect(route('parkings.index'));
        }

        return view('parkings.show')->with('parking', $parking)->with(compact('states' , 'stages', 'codigo'));
    }

    /**
     * Show the form for editing the specified Parking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $states = ([ 'Disponible' => 'Disponible' , 'Ocupado' =>'Ocupado' ]);
        $stages = Stage::pluck('name' , 'id');//where('users_id','=',Auth::user()->id)->
        $parking = $this->parkingRepository->findWithoutFail($id);
        $codigo = $parking->codigo;

        if (empty($parking)) {
            Flash::error('Parking not found');

            return redirect(route('parkings.index'));
        }

        return view('parkings.edit')->with('parking', $parking)->with(compact('states' , 'stages', 'codigo'));
    }

    /**
     * Update the specified Parking in storage.
     *
     * @param  int              $id
     * @param UpdateParkingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParkingRequest $request)
    {
        $parking = $this->parkingRepository->findWithoutFail($id);

        if (empty($parking)) {
            Flash::error('Parking not found');

            return redirect(route('parkings.index'));
        }

        $parking = $this->parkingRepository->update($request->all(), $id);

        Flash::success('Parking updated successfully.');

        return redirect(route('parkings.index'));
    }

    /**
     * Remove the specified Parking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parking = $this->parkingRepository->findWithoutFail($id);

        if (empty($parking)) {
            Flash::error('Parking not found');

            return redirect(route('parkings.index'));
        }

        $this->parkingRepository->delete($id);

        Flash::success('Parking deleted successfully.');

        return redirect(route('parkings.index'));
    }
    public function generarCodigo(){

        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
        $numerodeletras=10; //numero de letras para generar el texto
        $cadena = ""; //variable para almacenar la cadena generada
        for($i=0;$i<$numerodeletras;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres
        entre el rango 0 a Numero de letras que tiene la cadena */
        }
        return $cadena;

    }
}
