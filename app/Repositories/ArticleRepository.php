<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Interface ArticleRepository.
 *
 * @package namespace App\Repositories;
 */
interface ArticleRepository extends RepositoryInterface
{

}

// class ArticleRepository extends BaseRepository {

//     /**
//      * @var array
//      */
//     protected $fieldSearchable = [
//         'title',

//     ];

//     public function boot(){
//         $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

//     }

//     function model(){
//        return "App\Article";
//     }
// }
