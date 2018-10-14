<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStageAPIRequest;
use App\Http\Requests\API\UpdateStageAPIRequest;
use App\Models\Stage;
use App\Repositories\StageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StageController
 * @package App\Http\Controllers\API
 */

class StageAPIController extends AppBaseController
{
    /** @var  StageRepository */
    private $stageRepository;

    public function __construct(StageRepository $stageRepo)
    {
        $this->stageRepository = $stageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stages",
     *      summary="Get a listing of the Stages.",
     *      tags={"Stage"},
     *      description="Get all Stages",
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
     *                  @SWG\Items(ref="#/definitions/Stage")
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
        $this->stageRepository->pushCriteria(new RequestCriteria($request));
        $this->stageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stages = $this->stageRepository->all();

        return $this->sendResponse($stages->toArray(), 'Stages retrieved successfully');
    }

    /**
     * @param CreateStageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stages",
     *      summary="Store a newly created Stage in storage",
     *      tags={"Stage"},
     *      description="Store Stage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Stage that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Stage")
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
     *                  ref="#/definitions/Stage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStageAPIRequest $request)
    {
        $input = $request->all();

        $stages = $this->stageRepository->create($input);

        return $this->sendResponse($stages->toArray(), 'Stage saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stages/{id}",
     *      summary="Display the specified Stage",
     *      tags={"Stage"},
     *      description="Get Stage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stage",
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
     *                  ref="#/definitions/Stage"
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
        /** @var Stage $stage */
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            return $this->sendError('Stage not found');
        }

        return $this->sendResponse($stage->toArray(), 'Stage retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stages/{id}",
     *      summary="Update the specified Stage in storage",
     *      tags={"Stage"},
     *      description="Update Stage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stage",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Stage that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Stage")
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
     *                  ref="#/definitions/Stage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stage $stage */
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            return $this->sendError('Stage not found');
        }

        $stage = $this->stageRepository->update($input, $id);

        return $this->sendResponse($stage->toArray(), 'Stage updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stages/{id}",
     *      summary="Remove the specified Stage from storage",
     *      tags={"Stage"},
     *      description="Delete Stage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stage",
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
        /** @var Stage $stage */
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            return $this->sendError('Stage not found');
        }

        $stage->delete();

        return $this->sendResponse($id, 'Stage deleted successfully');
    }
}
