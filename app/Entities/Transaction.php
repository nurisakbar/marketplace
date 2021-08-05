<?php

namespace App\Entities;

use App\Models\User;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Transaction.
 *
 * @package namespace App\Entities;
 */
class Transaction extends Model implements Transformable
{
    use HasFactory, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'store_id',
        'courier_service_id',
        'user_address_id',
        'status',
        'note'
    ];

    protected static function newFactory()
    {
        return new TransactionFactory();
    }

    public static function statusValues()
    {
        return [
            'create_order',
            'seller_process_order',
            'send',
            'buyer_accept',
            'complain',
            'finish'
        ];
    }

    public function courierService()
    {
        return $this->belongsTo(CourierService::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->user()->id ?? 1;
    }
}
