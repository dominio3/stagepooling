<?php

namespace App\Http\Controllers;

use App\DataTables\ReservationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Repositories\ReservationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Parking;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Auth;



class ReservationController extends AppBaseController
{
    /** @var  ReservationRepository */
    private $reservationRepository;

    public function __construct(ReservationRepository $reservationRepo)
    {
        $this->reservationRepository = $reservationRepo;
    }

    /**
     * Display a listing of the Reservation.
     *
     * @param ReservationDataTable $reservationDataTable
     * @return Response
     */
    public function index(ReservationDataTable $reservationDataTable)
    {
        return $reservationDataTable->render('reservations.index');
    }

    /**
     * Show the form for creating a new Reservation.
     *
     * @return Response
     */
    public function create($p)
    {

        $states = ([ 'Activa' => 'Activa' , 'Finalizada' =>'Finalizada' ]);
        //$parkings = Parking::pluck('parking_code' , 'id');
        $vehicules = Vehicule::where('users_id','=', Auth::user()->id)->pluck('patent' , 'id');
        $codigo = $this->generarCodigo();
        $parking_id =  Parking::find($p);

        return view('reservations.create')->with(compact('states' , 'parkings' , 'vehicules' , 'codigo' ,'parking_id' ));
    }

    /**
     * Store a newly created Reservation in storage.
     *
     * @param CreateReservationRequest $request
     *
     * @return Response
     */
    public function store(CreateReservationRequest $request)
    {
        $input = $request->all();

        $reservation = $this->reservationRepository->create($input);

        Flash::success('Reservation saved successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Display the specified Reservation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = ([ 'Activa' => 'Activa' , 'Finalizada' =>'Finalizada' ]);
        $parkings = Parking::pluck('parking_code' , 'id');
        $vehicules = Vehicule::where('users_id','=', Auth::user()->id)->pluck('patent' , 'id');
        $reservation = $this->reservationRepository->findWithoutFail($id);
        $codigo = $reservation->codigo;
        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        return view('reservations.show')->with('reservation', $reservation)->with(compact('states' , 'parkings' , 'vehicules' , 'codigo'));
    }

    /**
     * Show the form for editing the specified Reservation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $states = ([ 'Activa' => 'Activa' , 'Finalizada' =>'Finalizada' ]);
        $parkings = Parking::pluck('parking_code' , 'id');
        $vehicules = Vehicule::where('users_id','=', Auth::user()->id)->pluck('patent' , 'id');
        $reservation = $this->reservationRepository->findWithoutFail($id);
        $codigo = $reservation->codigo;
        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        return view('reservations.edit')->with('reservation', $reservation)->with(compact('states' , 'parkings' , 'vehicules', 'codigo'));
    }

    /**
     * Update the specified Reservation in storage.
     *
     * @param  int              $id
     * @param UpdateReservationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReservationRequest $request)
    {
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        $reservation = $this->reservationRepository->update($request->all(), $id);

        Flash::success('Reservation updated successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Remove the specified Reservation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        $this->reservationRepository->delete($id);

        Flash::success('Reservation deleted successfully.');

        return redirect(route('reservations.index'));
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

    //cargar select dinamicamente

}
