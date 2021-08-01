<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'id'            =>  $this->id,
            'title'         =>  $this->title,
            'file_name'     =>  url('/category_video/' . $this->file_name),
            'category_id'   =>  $this->category_id,
            'active'        =>  $this->active,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'user_id'       => $this->user_id,
        ];
    }
}
