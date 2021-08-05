<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            // 'store' => new StoreResource($this->store),
            'store_id' => $this->store_id,
            'courier_service' => new CourierServiceResource($this->courierService),
            'user_address' => new UserAddressResource($this->userAddress),
            'status' => $this->status,
            'note' => $this->note
        ];
    }
}
