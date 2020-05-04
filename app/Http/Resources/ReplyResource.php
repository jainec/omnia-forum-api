<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'created_at' => $this->created_at->diffForHumans(),
            'question' => $this->question->description,
            'number_likes' => $this->likes->count(),
            'liked_by_logged_user' => !! $this->likes()->where('user_id', auth()->id())->count(),
        ];
    }
}
