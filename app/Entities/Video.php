<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\VideoFactory;

/**
 * Class Video.
 *
 * @package namespace App\Entities;
 */
class Video extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'category_id', 'slug', 'file_name', 'active', 'description', 'user_id'];
    protected static function newFactory()
    {
        return new VideoFactory();
    }

}
