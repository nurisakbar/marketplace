<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ForumFactory;

/**
 * Class Forum.
 *
 * @package namespace App\Entities;
 */
class Forum extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['topic','slug','user_id','description','images','category_id'];

    protected static function newFactory()
    {
        return new ForumFactory();
    }
}
