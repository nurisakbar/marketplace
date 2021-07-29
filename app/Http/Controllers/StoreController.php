<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StoreRepositoryEloquent;
use App\Http\Resources\StoreResource;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Services\StoreService;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepositoryEloquent $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('name')) {
            $store = $this->storeRepository->findWhere(['name' => $request->type]);
        } else {
            $store = $this->storeRepository->with('user_data')->all();
        }
        return StoreResource::collection($store);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateStoreRequest $request, StoreService $storeService)
    {
        $data   = $storeService->create($request);
        return new StoreResource($this->storeRepository->create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new StoreResource($this->storeRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, $id, StoreService $storeService)
    {
        return new StoreResource($this->storeRepository->update($storeService->create($request), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->storeRepository->delete($id);
        return response()->json(['message' => 'deleted']);
    }
}
