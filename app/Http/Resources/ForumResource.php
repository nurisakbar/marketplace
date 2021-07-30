<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
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
            'id'                => $this->  id,
            'user_id'           => $this->  user_id,
            'topic'             => $this->  topic,
            'description'       => $this->  description,
            'images'            => url('/category_image/' . $this->images)
        ];
    }
}
