<?php

namespace App\Http\Controllers;

use App\Repositories\UserAddressRepositoryEloquent;
use App\Http\Requests\CreateUserAddressRequest;
use App\Services\UserAddressService;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Http\Resources\UserAddressResource;

class UserAddressController extends Controller
{
    protected $userAddressRepository;

    public function __construct(UserAddressRepositoryEloquent $userAddressRepository)
    {
        $this->userAddressRepository = $userAddressRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAddres = $this->userAddressRepository->all();
        return UserAddressResource::collection($userAddres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserAddressRequest $request, UserAddressService $userAddresService)
    {
        return new UserAddressResource($this->userAddressRepository->create($userAddresService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserAddressResource($this->userAddressRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAddressRequest $request, $id)
    {
        return new UserAddressResource($this->userAddressRepository->update($request->all(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->userAddressRepository->delete($id);
    }
}
