<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question' => $this->description,
            'path' => $this->path,
            'created_at' => $this->created_at->diffForHumans(),
            'user' => $this->user->name,
            'number_replies' => $this->replies->count(),
        ];
    }
}
