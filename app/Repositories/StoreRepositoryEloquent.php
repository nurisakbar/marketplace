<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StoreRepository;
use App\Entities\Store;
use App\Validators\StoreValidator;

/**
 * Class StoreRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Store::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
