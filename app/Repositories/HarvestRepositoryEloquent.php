<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HarvestRepository;
use App\Entities\Harvest;
use App\Validators\HarvestValidator;

/**
 * Class HarvestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HarvestRepositoryEloquent extends BaseRepository implements HarvestRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Harvest::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
