<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'slug'          =>  $this->slug,
            'image'         =>  url('/article_image/' . $this->image),
            'description'   =>  $this->description,
            'category_id'   =>  $this->category_id,
        ];
    }
}
