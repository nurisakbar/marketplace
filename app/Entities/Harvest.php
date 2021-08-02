<?php

namespace App\Entities;

use Database\Factories\HarvestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Harvest.
 *
 * @package namespace App\Entities;
 */
class Harvest extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'description', 'slug', 'category_id', 'images'];

    protected static function newFactory()
    {
        return new HarvestFactory();
    }

    public function getImagesAttribute($value)
    {
        if($value){
            return unserialize($value);
        }
        return null;
    }
}
