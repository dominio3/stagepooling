<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehiculeAPIRequest;
use App\Http\Requests\API\UpdateVehiculeAPIRequest;
use App\Models\Vehicule;
use App\Repositories\VehiculeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VehiculeController
 * @package App\Http\Controllers\API
 */

class VehiculeAPIController extends AppBaseController
{
    /** @var  VehiculeRepository */
    private $vehiculeRepository;

    public function __construct(VehiculeRepository $vehiculeRepo)
    {
        $this->vehiculeRepository = $vehiculeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehicules",
     *      summary="Get a listing of the Vehicules.",
     *      tags={"Vehicule"},
     *      description="Get all Vehicules",
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
     *                  @SWG\Items(ref="#/definitions/Vehicule")
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
        $this->vehiculeRepository->pushCriteria(new RequestCriteria($request));
        $this->vehiculeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vehicules = $this->vehiculeRepository->all();

        return $this->sendResponse($vehicules->toArray(), 'Vehicules retrieved successfully');
    }

    /**
     * @param CreateVehiculeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vehicules",
     *      summary="Store a newly created Vehicule in storage",
     *      tags={"Vehicule"},
     *      description="Store Vehicule",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vehicule that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vehicule")
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
     *                  ref="#/definitions/Vehicule"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVehiculeAPIRequest $request)
    {
        $input = $request->all();

        $vehicules = $this->vehiculeRepository->create($input);

        return $this->sendResponse($vehicules->toArray(), 'Vehicule saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehicules/{id}",
     *      summary="Display the specified Vehicule",
     *      tags={"Vehicule"},
     *      description="Get Vehicule",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehicule",
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
     *                  ref="#/definitions/Vehicule"
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
        /** @var Vehicule $vehicule */
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            return $this->sendError('Vehicule not found');
        }

        return $this->sendResponse($vehicule->toArray(), 'Vehicule retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVehiculeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vehicules/{id}",
     *      summary="Update the specified Vehicule in storage",
     *      tags={"Vehicule"},
     *      description="Update Vehicule",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehicule",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vehicule that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vehicule")
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
     *                  ref="#/definitions/Vehicule"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVehiculeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vehicule $vehicule */
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            return $this->sendError('Vehicule not found');
        }

        $vehicule = $this->vehiculeRepository->update($input, $id);

        return $this->sendResponse($vehicule->toArray(), 'Vehicule updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vehicules/{id}",
     *      summary="Remove the specified Vehicule from storage",
     *      tags={"Vehicule"},
     *      description="Delete Vehicule",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehicule",
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
        /** @var Vehicule $vehicule */
        $vehicule = $this->vehiculeRepository->findWithoutFail($id);

        if (empty($vehicule)) {
            return $this->sendError('Vehicule not found');
        }

        $vehicule->delete();

        return $this->sendResponse($id, 'Vehicule deleted successfully');
    }
}
