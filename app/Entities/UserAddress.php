<?php

namespace App\Entities;

use Database\Factories\UserAddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserAddress.
 *
 * @package namespace App\Entities;
 */
class UserAddress extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'lebel', 'address', 'phone', 'name', 'village_id', 'default'];

    protected static function newFactory()
    {
        return new UserAddressFactory();
    }
}
