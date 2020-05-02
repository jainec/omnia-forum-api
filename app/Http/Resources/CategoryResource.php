<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $name = isset($this) ? $this->name : '-';
        return [
            'id' => $this->id,
            'name' => $name,
            'slug' => $this->slug,
            'created_at' => $this->created_at,            
        ];
    }
}
