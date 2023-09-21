<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'date_to_publish' => $this->date_to_publish,
            'image' => env('APP_URL') . '/' . $this->image,

            'user' => $this->user()->first(),
            'category_name' => $this->category->name

        ];
    }
}
