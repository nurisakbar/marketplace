<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HarvestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->images) {
            $images = collect($this->images)->map(function ($image) {
                return url('/harvest_image/' . $image);
            });
        } else {
            $images = [];
        }
        return [
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'title'         => $this->title,
            'description'   => $this->description,
            'slug'          => $this->slug,
            'category_id'   => $this->category_id,
            'images'        => $images,
        ];
    }
}
