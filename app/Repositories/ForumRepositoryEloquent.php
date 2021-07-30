<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ForumRepository;
use App\Entities\Forum;
use App\Validators\ForumValidator;

/**
 * Class ForumRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ForumRepositoryEloquent extends BaseRepository implements ForumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Forum::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
