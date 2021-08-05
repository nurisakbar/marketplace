<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ArticleFactory;

/**
 * Class Article.
 *
 * @package namespace App\Entities;
 */
class Article extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug','description','image','category_id','active','user_id'];

    protected static function newFactory()
    {
        return new ArticleFactory();
    }
}
