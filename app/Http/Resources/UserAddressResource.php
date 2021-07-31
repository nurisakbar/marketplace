<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
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
            'id'         =>  $this->id,
            'user_id'    =>  $this->user_id,
            'lebel'      =>  $this->lebel,
            'address'    =>  $this->address,
            'phone'      =>  $this->phone,
            'name'       =>  $this->name,
            'village_id' =>  $this->village_id,
            'default'    =>  $this->default,
        ];
    }
}
