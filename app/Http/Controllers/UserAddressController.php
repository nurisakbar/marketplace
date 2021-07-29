<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserAddressRepositoryEloquent;
use App\Http\Requests\CreateUserAddressRequest;
use App\Services\UserAddressService;
use App\Http\Resources\UserAddressResource;

class UserAddressController extends Controller
{
    protected $useraddresRepository;

    public function __construct(UserAddressRepositoryEloquent $useraddresRepository)
    {
        $this->useraddresRepository = $useraddresRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useraddres = $this->useraddresRepository->all();
        return UserAddressResource::collection($useraddres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserAddressRequest $request, UserAddressService $useraddresService)
    {
        $data   = $useraddresService->create($request);
        return new UserAddressResource($this->useraddresRepository->create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserAddressResource($this->useraddresRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->useraddresRepository->update($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->useraddresRepository->delete($id);
    }
}
