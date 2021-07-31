<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CourierRepository;
use App\Entities\Courier;
use App\Validators\CourierValidator;

/**
 * Class CourierRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CourierRepositoryEloquent extends BaseRepository implements CourierRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Courier::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
