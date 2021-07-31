<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CourierServiceRepository;
use App\Entities\CourierService;
use App\Validators\CourierServiceValidator;

/**
 * Class CourierServiceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CourierServiceRepositoryEloquent extends BaseRepository implements CourierServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CourierService::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
