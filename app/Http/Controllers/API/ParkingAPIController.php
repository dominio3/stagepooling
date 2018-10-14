<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParkingAPIRequest;
use App\Http\Requests\API\UpdateParkingAPIRequest;
use App\Models\Parking;
use App\Repositories\ParkingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ParkingController
 * @package App\Http\Controllers\API
 */

class ParkingAPIController extends AppBaseController
{
    /** @var  ParkingRepository */
    private $parkingRepository;

    public function __construct(ParkingRepository $parkingRepo)
    {
        $this->parkingRepository = $parkingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/parkings",
     *      summary="Get a listing of the Parkings.",
     *      tags={"Parking"},
     *      description="Get all Parkings",
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
     *                  @SWG\Items(ref="#/definitions/Parking")
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
        $this->parkingRepository->pushCriteria(new RequestCriteria($request));
        $this->parkingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parkings = $this->parkingRepository->all();

        return $this->sendResponse($parkings->toArray(), 'Parkings retrieved successfully');
    }

    /**
     * @param CreateParkingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parkings",
     *      summary="Store a newly created Parking in storage",
     *      tags={"Parking"},
     *      description="Store Parking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Parking that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Parking")
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
     *                  ref="#/definitions/Parking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateParkingAPIRequest $request)
    {
        $input = $request->all();

        $parkings = $this->parkingRepository->create($input);

        return $this->sendResponse($parkings->toArray(), 'Parking saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/parkings/{id}",
     *      summary="Display the specified Parking",
     *      tags={"Parking"},
     *      description="Get Parking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parking",
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
     *                  ref="#/definitions/Parking"
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
        /** @var Parking $parking */
        $parking = $this->parkingRepository->findWithoutFail($id);

        if (empty($parking)) {
            return $this->sendError('Parking not found');
        }

        return $this->sendResponse($parking->toArray(), 'Parking retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateParkingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parkings/{id}",
     *      summary="Update the specified Parking in storage",
     *      tags={"Parking"},
     *      description="Update Parking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Parking that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Parking")
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
     *                  ref="#/definitions/Parking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateParkingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Parking $parking */
        $parking = $this->parkingRepository->findWithoutFail($id);

        if (empty($parking)) {
            return $this->sendError('Parking not found');
        }

        $parking = $this->parkingRepository->update($input, $id);

        return $this->sendResponse($parking->toArray(), 'Parking updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parkings/{id}",
     *      summary="Remove the specified Parking from storage",
     *      tags={"Parking"},
     *      description="Delete Parking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Parking",
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
        /** @var Parking $parking */
        $parking = $this->parkingRepository->findWithoutFail($id);

        if (empty($parking)) {
            return $this->sendError('Parking not found');
        }

        $parking->delete();

        return $this->sendResponse($id, 'Parking deleted successfully');
    }
}
