<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserAddressRepository;
use App\Entities\UserAddress;
use App\Validators\UserAddressValidator;

/**
 * Class UserAddressRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserAddressRepositoryEloquent extends BaseRepository implements UserAddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserAddress::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
