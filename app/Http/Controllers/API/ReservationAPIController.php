<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReservationAPIRequest;
use App\Http\Requests\API\UpdateReservationAPIRequest;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ReservationController
 * @package App\Http\Controllers\API
 */

class ReservationAPIController extends AppBaseController
{
    /** @var  ReservationRepository */
    private $reservationRepository;

    public function __construct(ReservationRepository $reservationRepo)
    {
        $this->reservationRepository = $reservationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reservations",
     *      summary="Get a listing of the Reservations.",
     *      tags={"Reservation"},
     *      description="Get all Reservations",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Reservation")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->reservationRepository->pushCriteria(new RequestCriteria($request));
        $this->reservationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $reservations = $this->reservationRepository->all();

        return $this->sendResponse($reservations->toArray(), 'Reservations retrieved successfully');
    }

    /**
     * @param CreateReservationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reservations",
     *      summary="Store a newly created Reservation in storage",
     *      tags={"Reservation"},
     *      description="Store Reservation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Reservation that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Reservation")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Reservation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReservationAPIRequest $request)
    {
        $input = $request->all();

        $reservations = $this->reservationRepository->create($input);

        return $this->sendResponse($reservations->toArray(), 'Reservation saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reservations/{id}",
     *      summary="Display the specified Reservation",
     *      tags={"Reservation"},
     *      description="Get Reservation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Reservation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Reservation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Reservation $reservation */
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        return $this->sendResponse($reservation->toArray(), 'Reservation retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReservationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reservations/{id}",
     *      summary="Update the specified Reservation in storage",
     *      tags={"Reservation"},
     *      description="Update Reservation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Reservation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Reservation that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Reservation")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Reservation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReservationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Reservation $reservation */
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        $reservation = $this->reservationRepository->update($input, $id);

        return $this->sendResponse($reservation->toArray(), 'Reservation updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reservations/{id}",
     *      summary="Remove the specified Reservation from storage",
     *      tags={"Reservation"},
     *      description="Delete Reservation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Reservation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Reservation $reservation */
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        $reservation->delete();

        return $this->sendResponse($id, 'Reservation deleted successfully');
    }
}
