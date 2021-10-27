<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class VideosResource extends JsonResource
{
  
    public function toArray($request)
    {

        return [
            'title' => $this->name,
            'slug' => $this->slug,
            'seo_description' => $this->seo_description,
            'created_at' => $this->created_at
        ];
    }
}