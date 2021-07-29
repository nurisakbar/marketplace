<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CategoryFactory;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','image','type'];


    protected static function newFactory()
    {
        return new CategoryFactory();
    }
}
