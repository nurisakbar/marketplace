<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HarvestRepositoryEloquent;
use App\Http\Requests\CreateHarvestRequest;
use App\Http\Requests\UpdateHarvestRequest;
use App\Http\Resources\HarvestResource;
use App\Services\HarvestService;

class HarvestController extends Controller
{
    protected $harvestRepository;

    public function __construct(HarvestRepositoryEloquent $harvestRepository)
    {
        $this->harvestRepository = $harvestRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $harvests = $this->harvestRepository->all();

        return HarvestResource::collection($harvests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHarvestRequest $request, HarvestService $harvestService)
    {
        $data   = $harvestService->create($request);
        $harvest = $this->harvestRepository->create($data);

        return new HarvestResource($harvest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new HarvestResource($this->harvestRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHarvestRequest $request, $id, HarvestService $harvestService)
    {
        $data   = $harvestService->create($request);
        $harvest = $this->harvestRepository->update($data, $id);

        return new HarvestResource($harvest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->harvestRepository->delete($id);
    }
}
