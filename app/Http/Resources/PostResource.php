<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'featured_image_url' => $this->featured_image_url,
            'author' => $this->author->name,
            'category' => $this->category->name,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
